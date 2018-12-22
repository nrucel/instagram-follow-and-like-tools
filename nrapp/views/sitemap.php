<?php

    echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>' . base_url() . '</loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>' . base_url("satin-al") . '</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>' . base_url("blog") . '</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>';
    foreach($blogs AS $blog) {
        echo '<url>
                <loc>' . base_url("blog/".$blog["Ad"]) . '</loc>
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
              </url>';
    }
echo '<url>
        <loc>' . base_url("feed") . '</loc>
        <changefreq>daily</changefreq>
        <priority>0.7</priority>
    </url>';
    foreach($feeds AS $feed) {
        echo '<url>
                <loc>' . base_url("feed/".$feed["Ad"]) . '</loc>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
              </url>';
    }
echo '<url>
        <loc>' . base_url("tag") . '</loc>
        <changefreq>daily</changefreq>
        <priority>0.7</priority>
    </url>';
    foreach($tags AS $tag) {
        echo '<url>
                <loc>' . base_url("tag/".$tag["Ad"]) . '</loc>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
              </url>';
    }    
echo '<url>
        <loc>' . base_url("user") . '</loc>
        <changefreq>daily</changefreq>
        <priority>0.7</priority>
    </url>';
    foreach($users AS $user) {
        echo '<url>
                <loc>' . base_url("user/".$user["Ad"]) . '</loc>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
              </url>';
    }    

    echo '</urlset>';