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

<?php

//styles
require_once('assets/php-style/style.php');
require_once('assets/php-style/testimony_style.php');
require_once('assets/php-style/contact_style.php');
require_once('assets/php-style/pagination_style.php');
//navbar
require_once 'options/NavbarCustom.php';
$navbar = new NavbarCustom();
$navbar->render();

//selection de l'image de page pour la bannière

require_once 'options/BannerCustom.php';
$banner = new BannerCustom();
$banner->render();
?>
<div class="container pb-4">
