   <?php
   /**
    * Template Name: Page Contact
    * Template Post Type: page
    */
   ?>
   <!-- Container -->
    <?php
    get_header();
    ?>

    <div class="row">
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
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
    ?>
   