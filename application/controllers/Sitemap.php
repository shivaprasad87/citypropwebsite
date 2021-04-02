<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
       $this->load->model('home_model');
       $this->load->model('properties_model');
       $this->load->model('blogs_model');
    }

    function index()
    {

        $blogs = $this->blogs_model->order_by('id', 'desc')->getAll('blog');
        //print_r($data['blogs']);die;
        $items  = $this->home_model->properties_site_map();
        $cities= $this->properties_model->getWhere(array('status' => 1), 'cities');
        $blog_type = $this->home_model->getWhere(array('status' => 1), 'blog_type');
 header('Content-Type: application/xml');

  $output='';
 $output .= '<?xml version="1.0" encoding="UTF-8"?>';
 $output .= '
 <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                     http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
$output .="
    <url>
        <loc>".base_url()."</loc>
        <lastmod>".date('Y-m-d H:i:s')."</lastmod>
        <priority>1.0</priority>
    </url>";
$output .="
    <url>
        <loc>".base_url()."</loc>
        <lastmod>".date('Y-m-d H:i:s')."</lastmod>
        <priority>0.9</priority>
    </url>";
$output .="
    <url>
        <loc>".base_url('listing')."</loc>
        <lastmod>".date('Y-m-d H:i:s')."</lastmod>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>".base_url('about')."</loc>
        <lastmod>".date('Y-m-d H:i:s')."</lastmod>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>".base_url('contact')."</loc>
        <lastmod>".date('Y-m-d H:i:s')."</lastmod>
        <priority>0.5</priority>
    </url>";
foreach ($blog_type as $blog) { 

    $output .="     
    <url>
        <loc>".base_url('blog/').strtolower($blog->slug)."</loc>
        <lastmod>".date('Y-m-d H:i:s')."</lastmod>
        <priority>o.5</priority>
    </url>";
}
foreach ($blogs as $blogs) {

    $output .="     
    <url>
        <loc>".base_url('blog/').strtolower($blogs->slug)."</loc>
        <lastmod>".date('Y-m-d H:i:s')."</lastmod>
        <priority>0.5</priority>
    </url>";
}
foreach ($cities as $city) {

    $output .="     
           <url>
        <loc>".base_url().strtolower(('city/'.$city->url_name))."</loc>
        <lastmod>".date('Y-m-d H:i:s')."</lastmod>
        <priority>0.5</priority>
    </url>";
}
foreach($items as $property) { 

    $output .="     
    <url>
        <loc>".base_url().strtolower(url_title($property->city_name)."/".( url_title($property->area) )."/$property->slug/")."</loc>
        <lastmod>".date('Y-m-d H:i:s')."</lastmod>
        <priority>0.8</priority>
    </url>
";
}
$output .="</urlset>";
if ( ! write_file('./sitemap.xml', $output))
{
        echo 'Unable to write the file';
}
else
{
        echo 'File written!';
}
    }

}