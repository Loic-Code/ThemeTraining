<?php
$primary_color = get_theme_mod('primary_color', '#FEAA00');
$secondary_color = get_theme_mod('secondary_color', '#788404');
$light_color = get_theme_mod('light_color', '#F7F4EF');
$dark_color = get_theme_mod('dark_color', '#342628');
?>
<style>
   
    nav {
        background-color: <?= $dark_color ?> !important;
        color: <?= $light_color ?> !important;
    }
    nav a {
        color: <?= $light_color ?> !important;
    }


    body {
        background-color: <?= $primary_color ?> !important;
    }
    body .container {
        background-color: <?= $light_color ?> !important;
    }


    footer {
        background-color: <?= $dark_color ?> !important;
    }
    footer h6{
        color: <?= $primary_color ?> !important;
    }
    footer p{
        color: <?= $primary_color ?> !important;
    }
    footer .fab{
        color: <?= $primary_color ?> !important;
    }
    footer .fab:hover {
        color: <?= $secondary_color ?> !important;
    }
    footer i{
        color: <?= $primary_color ?> !important;
    }

</style>
