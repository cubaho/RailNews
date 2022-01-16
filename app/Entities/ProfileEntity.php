<?php

namespace App\Entities;

use Nette\Database\Connection;

class ProfileEntity
{
    private Connection $db;
    private $id;
    private $name;

    /**
     * @param Connection $db
     */
    public function __construct(Connection $db, $id = null)
    {
        $this->db = $db;
        if ($id) {
            $this->id = $id;
            $this->loadProfile();
        }
    }

    private function loadProfile(): void
    {
        $data = $this->db->fetch('
            SELECT p.name
            FROM Profiles p
            WHERE p.profileId = ?', $this->id
        );

        $this->name = $data->name;
    }

    public function getAllProfiles(): array
    {
        return $this->db->fetchPairs('SELECT profileId, name FROM Profiles');
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}