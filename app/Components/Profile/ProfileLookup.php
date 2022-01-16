<?php

namespace App\Components\Profile;

use App\Entities\ProfileEntity;
use Nette\Application\UI\Control;
use Nette\Database\Connection;

class ProfileLookup extends Control
{
    private Connection $db;
    private ProfileEntity $profile;
    /**
     * @param Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function render(): void
    {
        $profileId = $this->getPresenter()->getParameter('profileId');
        $this->profile = new ProfileEntity($this->db, $profileId);
        $this->template->profileName = $this->profile->getName();
        $this->template->render(__DIR__ . '/Template/ProfileLookup.latte');
    }
}