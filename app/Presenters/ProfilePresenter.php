<?php

namespace App\Presenters;

use App\Components\Profile\ProfileLookup;
use Nette\Database\Connection;
use Nette\DI\Attributes\Inject;
use Nette;

class ProfilePresenter extends Nette\Application\UI\Presenter
{
    #[Inject]
    public Connection $db;

    public function createComponentProfileLookup(): ProfileLookup
    {
        return new ProfileLookup($this->db);
    }
}