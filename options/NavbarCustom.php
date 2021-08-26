<?php

class NavbarCustom
{
    private const MENU_LOCTATION = 'header';

    private function getlinks(): array
    {
        $menu_locations = get_nav_menu_locations();
        $menu_object = $menu_locations[self::MENU_LOCTATION] ? wp_get_nav_menu_object($menu_locations[self::MENU_LOCTATION]) : null;
        $menu_name = $menu_object->slug ?? null;
        return wp_get_nav_menu_items($menu_name) ? wp_get_nav_menu_items($menu_name) : [];
    }

    private function getLogo(): void
    {
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
    }

    private function getUrl(): string
    {
        $obj_id = get_queried_object_id();
        return get_permalink($obj_id);
    }

    public function render()
    {
        ?>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <?php
                    $this->getLogo();
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <?php
                        /** @var WP_Post $link */
                        foreach ($this->getlinks() as $link) {
                            $link = $link->to_array();
                            $current_url = $this->getUrl()
                            ?>
                            <a class="nav-link<?= $current_url === $link['url'] ? ' active' : '' ?>" <?= $current_url === $link['url'] ? 'aria-current="page"' : '' ?>
                               href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
        <?php
    }
}