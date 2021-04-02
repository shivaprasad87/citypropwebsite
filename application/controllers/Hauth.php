<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class HAuth extends CI_Controller {

    public function __construct() {
        // Constructor to auto-load HybridAuthLib
        parent::__construct();
        $this->load->library('HybridAuthLib');
        $this->load->model('home_model');
    }

    public function index() {
        // Send to the view all permitted services as a user profile if authenticated
        $login_data['providers'] = $this->hybridauthlib->getProviders();
        foreach ($login_data['providers'] as $provider => $d) {
            if ($d['connected'] == 1) {
                $login_data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
            }
        }

        $this->load->view('hauth/home', $login_data);
    }

    public function login($provider) {
        log_message('debug', "controllers.HAuth.login($provider) called");

        try {
            log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
            $this->load->library('HybridAuthLib');

            if ($this->hybridauthlib->providerEnabled($provider)) {
                log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
                $service = $this->hybridauthlib->authenticate($provider);
                if ($service->isUserConnected()) {
                    log_message('debug', 'controller.HAuth.login: user authenticated.');

                    $user_profile = $service->getUserProfile();

                    log_message('info', 'controllers.HAuth.login: user profile:' . PHP_EOL . print_r($user_profile, TRUE));

                    $login_details = $this->home_model->getCreds($user_profile->email);
                    if ($login_details) {
                        $this->session->set_userdata('logged_in', $login_details);
                        if ($login_details['is_admin']) {
                            redirect(site_url('admin'));
                        } else
                            redirect(site_url());
                    }else {
                        $this->home_model->insertRow(array('email' => $user_profile->email, 'username' => $user_profile->email, 'first_name' => $user_profile->firstName, 'last_name' => $user_profile->lastName, 'language' => 'english'), 'users');
                        $login_details = $this->home_model->getCreds($user_profile->email);
                        $this->session->set_userdata('logged_in', $login_details);
                        redirect(site_url());
                    }

                    // $data['user_profile'] = $user_profile;
                    // $this->load->view('hauth/done',$data);
                } else { // Cannot authenticate user
                
                    show_error('Cannot authenticate user');
                }
            } else { // This service is not enabled.
                log_message('error', 'controllers.HAuth.login: This provider is not enabled (' . $provider . ')');
                show_404($_SERVER['REQUEST_URI']);
            }
        } catch (Exception $e) {
            $error = 'Unexpected error';
            switch ($e->getCode()) {
                case 0 : $error = 'Unspecified error.';
                    break;
                case 1 : $error = 'Hybriauth configuration error.';
                    break;
                case 2 : $error = 'Provider not properly configured.';
                    break;
                case 3 : $error = 'Unknown or disabled provider.';
                    break;
                case 4 : $error = 'Missing provider application credentials.';
                    break;
                case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
                    //redirect();
                    if (isset($service)) {
                        log_message('debug', 'controllers.HAuth.login: logging out from service.');
                        $service->logout();
                    }
                    show_error('User has cancelled the authentication or the provider refused the connection.');
                    break;
                case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                    break;
                case 7 : $error = 'User not connected to the provider.';
                    break;
            }

            if (isset($service)) {
                $service->logout();
            }

            log_message('error', 'controllers.HAuth.login: ' . $error);
            show_error('Error authenticating user.');
        }
    }

    public function endpoint() {

        log_message('debug', 'controllers.HAuth.endpoint called.');
        log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: ' . print_r($_REQUEST, TRUE));

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
            $_GET = $_REQUEST;
        }

        log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
        require_once APPPATH . '/third_party/hybridauth/index.php';
    }
    
    private function import_classes(){
        require_once  FCPATH. "vendor/autoload.php";
    }

    public function fb_login() {

        $this->import_classes();
        $fb_config = $this->getFbConfig();
        $fb = new \Facebook\Facebook($fb_config);
        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email', 'public_profile']; // Optional permissions
        $loginUrl = $helper->getLoginUrl(site_url('hauth/facebook'), $permissions);
        redirect($loginUrl);
    }

    public function facebook() {
        $this->import_classes();
        $fb_config = $this->getFbConfig();
        $fb = new Facebook\Facebook($fb_config);
        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);

// Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId($fb_config['app_id']); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }
        }

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=id,email,name,first_name,last_name', (string) $accessToken);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();
        $login_details = $this->home_model->getCreds($user['email']);
        if ($login_details) {
            $this->session->set_userdata('logged_in', $login_details);
            if ($login_details['is_admin']) {
                redirect(site_url('admin'));
            } else
                redirect(site_url());
        }else {
            $this->home_model->insertRow(array('email' => $user['email'], 'username' => $user['email'], 'first_name' => $user['first_name'], 'last_name' => $user['last_name'], 'language' => 'english'), 'users');
            $login_details = $this->home_model->getCreds($user['email']);
            $this->session->set_userdata('logged_in', $login_details);
            redirect(site_url());
        }
// User is logge
    }

    protected function getFbConfig() {
        $this->load->config('facebook');
        $this->load->helper('url');
        $providers = $this->config->item('providers');
        $credentials = $providers['Facebook']['keys'];
        $fb_config = array(
            'appId' => $credentials['id'],
            'secret' => $credentials['secret']
        );
        return [
            'app_id' => $credentials['id'], // Replace {app-id} with your app id
            'app_secret' => $credentials['secret'],
            'default_graph_version' => 'v2.2',
        ];
    }

}

/* End of file hauth.php */
  	/* Location: ./application/controllers/hauth.php */
