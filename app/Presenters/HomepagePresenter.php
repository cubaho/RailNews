<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Components\Posts\PostsList;
use App\Components\Posts\PostsSearchForm;
use Nette;
use Nette\DI\Attributes\Inject;
use Nette\Database\Connection;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    #[Inject]
    public Connection $db;

    public function createComponentPostsList(): PostsList
    {
        return new PostsList($this->db);
    }

    public function createComponentPostsSearchForm(): PostsSearchForm
    {
        return new PostsSearchForm($this->db);
    }
}
