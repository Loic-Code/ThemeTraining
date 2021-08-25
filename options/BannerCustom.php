<?php

class BannerCustom
{
    private const PAGES = [
        'post' => 'actualites',
        'post' => 'blog',
        'bien' => 'nos biens'
    ];

    private function getUrl()
    {
        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        list($url, $width, $height, $is_intermediate) = $thumbnail;
        return $url;
    }

    public function searchPostId(string $title, string $postType = 'page'): int
    {
        return (new WP_Query([
            'title' => $title,
            'post_type' => $postType,
        ]))->post->ID;
    }

    public function render(): void
    {
        if (is_404()) {
            ?>
            <div class="page-header d-flex align-items-center justify-content-center"
                 style="background-image: url(<?php header_image() ?>)"></div>
            <?php
        } elseif (is_home() || array_key_exists(get_post_type(), self::PAGES)) {
            foreach (self::PAGES as $page) {
                if (self::PAGES[get_post_type()] === $page) {
                    ?>
                    <div class="page-header d-flex align-items-center justify-content-center"
                         style="background-image: url(<?= get_the_post_thumbnail_url($this->searchPostId($page)) ?>"></div>
                    <?php
                }
            }
        } else {
            ?>
            <div class="row p-0 m-0">
                <div class="page-header d-flex align-items-center justify-content-center"
                     style="background-image: url(<?= $this->getUrl() ?>)"></div>
            </div>
            <?php
        }
        //var_dump(get_queried_object());
    }
}