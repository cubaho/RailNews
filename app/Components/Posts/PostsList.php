<?php

namespace App\Components\Posts;

use App\Entities\ProfileEntity;
use App\Models\PostsModel;
use Nette\Application\UI\Control;
use Nette\Database\Connection;
use Nette\Utils\Paginator;

class PostsList extends Control
{
    CONST ITEMS_PER_PAGE = 5;

    private Connection $db;
    private Paginator $paginator;
    private PostsModel $postsModel;
    private array $links;
    private array $profiles;
    private string $searchText;

    /**
     * @param Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->paginator = new Paginator();
        $this->postsModel = new PostsModel($db);
        $this->db = $db;
    }

    public function render(): void
    {
        $this->init();

        $this->template->posts = $this->postsModel->getPosts();
        $this->template->links = $this->links;
        $this->template->paginator = $this->paginator;
        $this->template->profiles = $this->profiles;
        $this->template->render(__DIR__ . '/Template/postsList.latte');
    }

    private function init()
    {
        $this->searchText = $this->getPresenter()->getParameter('searchText') ?? '';
        $this->initPaginator();
        $this->initPageLinks();
        $this->postsModel->initPosts(
            $this->paginator->getLength(),
            $this->paginator->getOffset(),
            $this->searchText,
        );
        $profiles = new ProfileEntity($this->db);

        foreach ($profiles->getAllProfiles() as $id => $profile) {
            $this->profiles[$profile] = $this->getPresenter()->link('Profile:default', array('profileId' => $id));
        }
    }

    private function initPaginator() : void
    {
        $this->paginator->setPage($this->getPresenter()->getParameter('page') ?? 1);
        $this->paginator->setItemsPerPage(self::ITEMS_PER_PAGE);
        $this->paginator->setItemCount($this->postsModel->getPostsCount($this->searchText));
    }

    private function initPageLinks() : void
    {
        $links = array();
        foreach (range(1, $this->paginator->getPageCount()) as $page) {
            $links[$page] = $this->getPresenter()->link('this', array('page' => $page));
        };
        $this->links = $links;
    }
}