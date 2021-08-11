<?php get_header() ?>

<!-- Container -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="p-4">
            <?php
            the_title();
            ?>
        </h1>
        <div class="row">
            <?php
            the_content();
            ?>
        </div>
<?php endwhile;
endif; ?>

<!-- /container -->
<?php get_footer() ?>