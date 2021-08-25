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

    nav:not(.paginate-custom) {
        background-color: <?= $dark_color ?> !important;
        color: <?= $primary_color ?> !important;
    }

    nav a {
        color: <?= $primary_color ?> !important;
        font-family: <?= $font_text ?> !important;
        font-size: <?= $text_size ?> !important;
    }


    body {
        background-color: <?= $secondary_color ?> !important;
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
        color: <?= $dark_color ?> !important;
    }


    footer {
        background-color: <?= $dark_color ?> !important;
    }

    footer h6 {
        color: <?= $primary_color ?> !important;
        font-size: <?= $subtitle_size ?> !important;
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

    .main-actu .text {
        color: <?= $dark_color ?> !important;
    }

    .main-actu .text span[class*="title"] {
        font-size: <?= $subtitle_size ?>;
    }

    .main-actu:hover .text span[class*="title"] {
        color: <?= $primary_color ?> !important;
    }

    .btn {
        background: <?= $light_color ?> !important;
        color: r<?= $primary_color ?> !important;
    }

    .btn:hover {
        background: <?= $primary_color ?> !important;
        color: <?= $light_color ?> !important;
    }

    .btn.btn--with-icon i {
        color: <?= $light_color ?> !important;
        background: <?= $primary_color ?> !important;
    }

    .text span {
        color: <?= $dark_color ?> !important;
    }

    .text span:hover {
        color: <?= $primary_color ?> !important;
    }

    .text i {
        color: <?= $primary_color ?> !important;
    }

    .profile figcaption {
        background-color: <?= $light_color ?> !important;
    }

    .profile .profile-image {
        border: 2px solid <?= $primary_color ?> !important;
    }

    .profile i {
        color: <?= $light_color ?> !important;
    }

    figure.testimony {
        color: <?= $primary_color ?> !important;
    }

    figure.testimony blockquote {
        background-color: <?= $light_color ?> !important;
    }

    figure.testimony .author {
        color: <?= $light_color ?> !important;
    }

    .counter {
        background-color: <?= $light_color ?> !important;
    }

    .count-text {
        color: <?= $primary_color ?> !important;
    }

    .fa-2x {
        color: <?= $primary_color ?> !important;
    }

    .counter:hover {
        background-color: <?= $primary_color ?> !important;
    }

    .counter:hover .fa-2x,
    .counter:hover .count-title,
    .counter:hover .count-text {
        color: <?= $light_color ?> !important;
    }

    .banner-testimony {
        background-color: <?= $dark_color ?> !important;
    }

    .describe-staff {
        color: <?= $light_color ?> !important;
    }

    .profile i:hover {
        color: <?= $primary_color ?> !important;
    }

    .banner-staff {
        background-color: <?= $primary_color ?> !important;
    }
</style>