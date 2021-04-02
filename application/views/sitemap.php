<?php
 header('Content-Type: application/xml');
 $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
 echo $output;
 ?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->
<!-- My code is looking quite different, but the principle is similar -->
    <url>
        <loc><?= base_url();?></loc>
        <lastmod><?=date('Y-m-d H:i:s');?></lastmod>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= base_url('listing');?></loc>
        <lastmod><?=date('Y-m-d H:i:s');?></lastmod>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?= base_url('about');?></loc>
        <lastmod><?=date('Y-m-d H:i:s');?></lastmod>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= base_url('contact');?></loc>
        <lastmod><?=date('Y-m-d H:i:s');?></lastmod>
        <priority>0.5</priority>
    </url>
     
                                            }
        <?php foreach ($blog_type as $blog) { ?>     
           <url>
        <loc><?= base_url('blog/').strtolower($blog->slug);?></loc>
        <lastmod><?=date('Y-m-d H:i:s');?></lastmod>
        <priority>0.8</priority>
    </url>
        
            <?php } ?>
            <?php foreach ($blogs as $blogs) { ?>     
           <url>
        <loc><?= base_url('blog/').strtolower($blogs->slug);?></loc>
        <lastmod><?=date('Y-m-d H:i:s');?></lastmod>
        <priority>0.8</priority>
    </url>
        
            <?php } ?>
                                                  
    <?php foreach ($cities as $city) { ?>     
           <url>
        <loc><?= base_url().strtolower(('city/'.$city->url_name));?></loc>
        <lastmod><?=date('Y-m-d H:i:s');?></lastmod>
        <priority>0.5</priority>
    </url>
        
            <?php } ?>
    <?php foreach($items as $property) { ?>
    <url>
        <loc><?= base_url().strtolower(url_title($property->city_name)."/".( url_title($property->area) )."/$property->slug/")?></loc>
        <lastmod><?=date('Y-m-d H:i:s');?></lastmod>
        <priority>0.5</priority>
    </url>
    <?php } ?>

</urlset>