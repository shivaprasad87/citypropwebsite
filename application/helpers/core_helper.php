<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Outputs an array in a user-readable JSON format
 *
 * @param array $array
 */
if (!function_exists('display_json')) {
    function display_json($array)
    {
        $data = json_indent($array);

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        echo $data;
    }
}


/**
 * Convert an array to a user-readable JSON string
 *
 * @param array $array - The original array to convert to JSON
 * @return string - Friendly formatted JSON string
 */
if (!function_exists('json_indent')) {
    function json_indent($array = array())
    {
        // make sure array is provided
        if (empty($array)) {
            return null;
        }

        //Encode the string
        $json = json_encode($array);

        $result = '';
        $pos = 0;
        $str_len = strlen($json);
        $indent_str = '  ';
        $new_line = "\n";
        $prev_char = '';
        $out_of_quotes = true;

        for ($i = 0; $i <= $str_len; $i++) {
            // grab the next character in the string
            $char = substr($json, $i, 1);

            // are we inside a quoted string?
            if ($char == '"' && $prev_char != '\\') {
                $out_of_quotes = !$out_of_quotes;
            } // if this character is the end of an element, output a new line and indent the next line
            elseif (($char == '}' OR $char == ']') && $out_of_quotes) {
                $result .= $new_line;
                $pos--;

                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indent_str;
                }
            }

            // add the character to the result string
            $result .= $char;

            // if the last character was the beginning of an element, output a new line and indent the next line
            if (($char == ',' OR $char == '{' OR $char == '[') && $out_of_quotes) {
                $result .= $new_line;

                if ($char == '{' OR $char == '[') {
                    $pos++;
                }

                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indent_str;
                }
            }

            $prev_char = $char;
        }

        // return result
        return $result . $new_line;
    }
}


/**
 * Save data to a CSV file
 *
 * @param array $array
 * @param string $filename
 * @return bool
 */
if (!function_exists('array_to_csv')) {
    function array_to_csv($array = array(), $filename = "export.csv")
    {
        $CI = get_instance();

        // disable the profiler otherwise header errors will occur
        $CI->output->enable_profiler(false);

        if (!empty($array)) {
            // ensure proper file extension is used
            if (!substr(strrchr($filename, '.csv'), 1)) {
                $filename .= '.csv';
            }

            try {
                // set the headers for file download
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                header("Content-type: text/csv");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename={$filename}");

                $output = @fopen('php://output', 'w');

                // used to determine header row
                $header_displayed = false;

                foreach ($array as $row) {
                    if (!$header_displayed) {
                        // use the array keys as the header row
                        fputcsv($output, array_keys($row));
                        $header_displayed = true;
                    }

                    // clean the data
                    $allowed = '/[^a-zA-Z0-9_ %\|\[\]\.\(\)%&-]/s';
                    foreach ($row as $key => $value) {
                        $row[$key] = preg_replace($allowed, '', $value);
                    }

                    // insert the data
                    fputcsv($output, $row);
                }

                fclose($output);

            } catch (Exception $e) {
            }
        }

        exit;
    }
}


/**
 * Generates a random password
 *
 * @return string
 */
if (!function_exists('generate_random_password')) {
    function generate_random_password()
    {
        $characters = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alpha_length = strlen($characters) - 1;

        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alpha_length);
            $pass[] = $characters[$n];
        }

        return implode($pass);
    }
}


/**
 * Retrieves list of language folders
 *
 * @return array
 */
if (!function_exists('get_languages')) {
    function get_languages()
    {
        $CI = get_instance();

        if ($CI->session->languages) {
            return $CI->session->languages;
        }

        $CI->load->helper('directory');

        $language_directories = directory_map(APPPATH . '/language/', 1);
        if (!$language_directories) {
            $language_directories = directory_map(BASEPATH . '/language/', 1);
        }

        $languages = array();
        foreach ($language_directories as $language) {
            if (substr($language, -1) == "/" || substr($language, -1) == "\\") {
                $languages[substr($language, 0, -1)] = ucwords(str_replace(array('-', '_'), ' ',
                    substr($language, 0, -1)));
            }
        }

        $CI->session->languages = $languages;

        return $languages;
    }
}


/**
 * Sort a multi-dimensional array
 *
 * @param array $arr - the array to sort
 * @param string $col - the key to base the sorting on
 * @param string $dir - SORT_ASC or SORT_DESC
 */
if (!function_exists('array_sort_by_column')) {
    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }
}

if (!function_exists('number_format_short')) {
    /**
     * Short Number format
     * @param $n
     * @param int $precision
     * @return string
     */
    function number_format_short($n, $precision = 2)
    {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else {
            if ($n < 90000) {
                // 0.9k-850k
                $n_format = number_format($n / 1000, $precision);
                $suffix = 'K';
            } else {
                if ($n < 9000000) {
                    // 0.9L-850L
                    $n_format = number_format($n / 100000, $precision);
                    $suffix = 'L';
                } else {
                    if ($n < 900000000) {
                        // 0.9Cr-850Cr
                        $n_format = number_format($n / 10000000, $precision);
                        $suffix = 'Cr.';
                    } else {
                        // 0.9t+
                        $n_format = number_format($n / 1000000000000, $precision);
                        $suffix = 'T';
                    }
                }
            }
        }
        // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
        // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ($precision > 0) {
            $dotzero = '.' . str_repeat('0', $precision);
            $n_format = str_replace($dotzero, '', $n_format);
        }
        return $n_format . $suffix;
    }
}

if (!function_exists('verify_captcha')) {

    function verify_captcha()
    {
        #
        # Verify captcha
        $post_data = http_build_query(
            array(
                'secret' => '6LfZsEcUAAAAAH28sxnY4ACpHEQgahyULIMxtrjU',
                'response' => $_POST['g-recaptcha-response'],
                'remoteip' => $_SERVER['REMOTE_ADDR']
            )
        );
        $opts = array(
            'http' =>
                array(
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $post_data
                )
        );
        //$context = stream_context_create($opts);
        //$response = file_get_contents('http://www.google.com/recaptcha/api/siteverify?'.$post_data);
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://www.google.com/recaptcha/api/siteverify?'.$post_data
        ));

        // Send the request & save response to $resp
        $response = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        $result = json_decode($response);

        return !$result->success ? false : true;
    }
}


if(!function_exists('getYoutubeVideoId')){
    function getYoutubeVideoId($video_id){

        // Did we get a URL?
        if ( FALSE !== filter_var( $video_id, FILTER_VALIDATE_URL ) )
        {

            // http://www.youtube.com/v/abcxyz123
            if ( FALSE !== strpos( $video_id, '/v/' ) )
            {
                list( , $video_id ) = explode( '/v/', $video_id );
            }
            // http://www.youtube.com/embed/abcxyz123
            else if( FALSE !== strpos( $video_id, '/embed/' )){
                list( , $video_id ) = explode( '/embed/', $video_id );
            }
            // http://youtu.be/Q8d7LjYrN38
            else if(FALSE !== strpos($video_id, 'youtu.be')){
                $exploded = explode('/', $video_id);
                $video_id = end($exploded);
            }
            // http://www.youtube.com/watch?v=abcxyz123
            else{
                $video_query = parse_url( $video_id, PHP_URL_QUERY );
                parse_str( $video_query, $video_params );
                $video_id = isset($video_params['v']) ? $video_params['v'] : null;
            }

        }

        return $video_id;

    }
}