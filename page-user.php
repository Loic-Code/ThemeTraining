<?php
/*
Template Name: Pages Utilisateur
Template Post Type: page
 */
?>
<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="p-4 ml-4">
        <?php
        the_title();
        ?>
    </h1>
    <?php
    the_content();
    ?>
    </div>
<?php endwhile;
endif;
?>

<?php get_footer() ?>