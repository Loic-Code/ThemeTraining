<?php
$primary_color = get_theme_mod('primary_color', '#FEAA00');
$secondary_color = get_theme_mod('secondary_color', '#788404');
$light_color = get_theme_mod('light_color', '#F7F4EF');
$dark_color = get_theme_mod('dark_color', '#342628');
$font_title = "'Alegreya Sans SC', sans-serif";
$subtitle_size = '1.5em';
$font_text = "'Belleza', sans-serif";
$text_size = '1.2em';
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC&family=Belleza&display=swap');

    nav {
        background-color: <?= $dark_color ?> !important;
        color: <?= $primary_color ?> !important;
    }

    nav a {
        color: <?= $primary_color ?> !important;
        font-family: <?= $font_text ?> !important;
        font-size: <?= $text_size ?> !important;
    }


    body {
        background-color: <?= $primary_color ?> !important;
    }

    body .container {
        background-color: <?= $dark_color ?> !important;
    }

    body h1,
    body h2,
    body h3,
    body h4 {
        font-family: <?= $font_title ?> !important;
        color: <?= $primary_color ?> !important;
    }

    body h1 {
        font-weight: bold;
        font-size: 5em;
    }

    body p {
        font-family: <?= $font_text ?> !important;
        font-size: <?= $text_size ?> !important;
        color: <?= $light_color ?> !important;
    }


    footer {
        background-color: <?= $dark_color ?> !important;
    }

    footer h6 {
        color: <?= $primary_color ?> !important;
        font-size:<?= $subtitle_size ?> !important;
    }

    footer .fab {
        color: <?= $primary_color ?> !important;
    }

    footer .fab:hover {
        color: <?= $secondary_color ?> !important;
    }

    footer i {
        color: <?= $primary_color ?> !important;
    }
</style>