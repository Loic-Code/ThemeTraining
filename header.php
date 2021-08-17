<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body class="<?= str_replace('.php', '', get_page_template_slug()) ?>">
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => false,
                'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
            ]) ?>
        </div>
    </div>
</nav>
<?php

$bannerBlog = (new WP_Query([
    'title' => 'Blog',
    'post_type' => 'page',
]))->post->ID;
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
list($url, $width, $height, $is_intermediate) = $thumbnail;
?>
<?php if (is_404()): ?>
    <div class="page-header d-flex align-items-center justify-content-center"
         style="background-image: url(<?php header_image() ?>)"></div>
<?php elseif (is_home() || get_post_type() === 'post' ): ?>
        <div class="page-header d-flex align-items-center justify-content-center"
             style="background-image: url(<?= get_the_post_thumbnail_url($bannerBlog) ?>)"></div>
<?php else: ?>
    <div class="row p-0 m-0">
        <div class="page-header d-flex align-items-center justify-content-center"
             style="background-image: url(<?= $url ?>)"></div>
    </div>
<?php endif; ?>
<div class="container">
