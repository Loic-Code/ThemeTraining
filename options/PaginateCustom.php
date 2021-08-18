<?php

class PaginateCustom
{
    private string $postType;
    private int $postPerPage;
    private string $postStatus;
    private string $slugRedirect;

    public function __construct(string $postType, string $slugRedirect, int $postPerPage = 10, string $postStatus = 'publish')
    {
        $this->postType = $postType;
        $this->slugRedirect = $slugRedirect;
        $this->postPerPage = $postPerPage;
        $this->postStatus = $postStatus;
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
            'paged' => $this->getPageActual()
        ];
    }

    public function searchPosts(): WP_Query
    {
        return new WP_Query($this->setQueryArguments($this->setQueryArguments()));
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
            '/'. $this->slugRedirect .'/'
        );
    }

    public function paginateBootstrap()
    {
        $pageActual = absint($this->getPageActual());
        $pageMax = absint($this->getTotalPages());
        ?>

        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item<?= $pageActual === 1 ? ' disabled' : ''?>">
                    <a class="page-link" href="<?= $this->linkPaginate($pageActual - 1) ?>">Précédent</a>
                </li>
                <?php for ($i = 1; $i <= $pageMax; $i++) : ?>
                    <li class="page-item<?= $pageActual === $i ? ' active' : '' ?>" aria-current="page">
                        <a class="page-link" href="<?= $this->linkPaginate($i) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item<?= $pageActual === $pageMax ? ' disabled' : ''?>">
                    <a class="page-link" href="<?= $this->linkPaginate($pageActual + 1) ?>">Next</a>
                </li>
            </ul>
        </nav>
        <?php
    }
}