<?php

class PaginateCustom
{
    private string $postType;
    private int $postPerPage;
    private string $postStatus;
    private string $slugRedirect;
    private array $exclude;

    public function __construct(string $postType, array $excludeIds = [], string $postStatus = 'publish')
    {
        $object = get_queried_object();
        if ($object instanceof WP_Term)
        {
            $this->slugRedirect = $object->taxonomy . '/' . $object->slug;
        }else{
            $this->slugRedirect = (get_queried_object())->post_name;
        }
        $this->postType = $postType;
        $this->postPerPage = get_option('posts_per_page');
        $this->postStatus = $postStatus;
        $this->exclude = $excludeIds;
    }

    private function getPageActual(): string
    {
        return get_query_var('paged') ? get_query_var('paged') : '1';
    }

    private function setQueryArguments(): array
    {
        return [
            'post_type' => $this->postType,
            'post_status' => $this->postStatus,
            'posts_per_page' => $this->postPerPage,
            'post__not_in' => $this->exclude,
            'paged' => $this->getPageActual()
        ];
    }

    public function searchPosts(): WP_Query
    {
        return new WP_Query($this->setQueryArguments());
    }

    private function getTotalPages(): int
    {
        return $this->searchPosts()->max_num_pages;
    }

    private function linkPaginate(int $page): string
    {
        return add_query_arg(
            'paged',
            $page,
            get_the_permalink( (get_queried_object())->ID ) . $this->slugRedirect . '/'
        );
    }

    public function render()
    {
        $pageActual = absint($this->getPageActual());
        $pageMax = absint($this->getTotalPages());
        $totalPosts = absint((wp_count_posts($this->postType))->publish);

        if ($totalPosts > $this->postPerPage) {
            ?>
            <nav class="paginate-custom" aria-label="...">
                <ul class="pagination d-flex flex-column flex-sm-row">
                    <li class="page-item<?= $pageActual === 1 ? ' disabled' : '' ?>">
                        <a class="page-link rounded" href="<?= $this->linkPaginate($pageActual - 1) ?>">Précédent</a>
                    </li>
                    <?php for ($i = 1; $i <= $pageMax; $i++) : ?>
                        <li class="page-item<?= $pageActual === $i ? ' active' : '' ?>" aria-current="page">
                            <a class="page-link rounded" href="<?= $this->linkPaginate($i) ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item<?= $pageActual === $pageMax ? ' disabled' : '' ?>">
                        <a class="page-link rounded" href="<?= $this->linkPaginate($pageActual + 1) ?>">Suivant</a>
                    </li>
                </ul>
            </nav>
            <?php
        }
    }
}