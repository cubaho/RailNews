<?php

namespace App\Components\Posts;

use Nette\Database\Connection;
use Nette\Application\UI\Form;

class PostsSearchForm extends Form
{
    private Connection $db;

    /**
     * @param Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
        $this->setup();
        parent::__construct();
    }

    private function setup()
    {
        $this->setHtmlAttribute('class', 'form');
        $this->addText('search')
            ->setMaxLength(50)
            ->setHtmlAttribute('placeholder', 'Search text')
            ->setHtmlAttribute('class', 'form-control')
        ;
        $this->addSubmit('searchSubmit', 'Search')
            ->setHtmlAttribute('class', 'btn btn-primary')
            ->onClick[] = [$this, 'searchClicked'];
    }

    public function searchClicked()
    {
        $searchText = $this->getValues()['search'];
        $this->getPresenter()->redirect('default', array('searchText' => $searchText));
    }

}