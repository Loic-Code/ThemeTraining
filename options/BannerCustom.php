<?php

class BannerCustom
{
    private array $pageListingCustomPost = [];

    public function __construct()
    {
        $this->pageListingCustomPost ['post'] = get_the_title(get_option('page_for_posts', true));
        $this->setPageListingCustomPost($this->singlePost());
    }

    private function singlePost(): array
    {
        if (get_post_type() !== 'post') {
            $singleTemplate = str_replace(get_stylesheet_directory() . '/single', 'page', get_single_template());
            $singleTemplate = str_replace(get_template_directory() . '/single', 'page', $singleTemplate);
            $templatePostType = str_replace('page-', '', $singleTemplate);
            $templatePostType = str_replace('.php', '', $templatePostType);
            $titlePageCustom = get_pages([
                'meta_key' => '_wp_page_template',
                'meta_value' => $singleTemplate
            ]);
            $titlePageCustom = isset($titlePageCustom[0]) ? $titlePageCustom[0]->post_title : '';
            return $titlePageCustom ? [$templatePostType => $titlePageCustom] : [];
        }

        return [];
    }

    private function getUrl()
    {
        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        list($url, $width, $height, $is_intermediate) = $thumbnail;
        return $url;
    }

    private function searchPostId(string $title, string $postType = 'page'): int
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
        } elseif (is_home() || array_key_exists(get_post_type(), $this->getPageListingCustomPost())) {
            foreach ($this->getPageListingCustomPost() as $page) {
                if ($this->getPageListingCustomPost()[get_post_type()] === $page) {
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

    public function setPageListingCustomPost(array $pageListingCustomPost): BannerCustom
    {
        $this->pageListingCustomPost = array_merge($this->getPageListingCustomPost(), $pageListingCustomPost);
        return $this;
    }

    public function getPageListingCustomPost(): array
    {
        return $this->pageListingCustomPost;
    }
}