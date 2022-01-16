<?php

namespace App\Entities;

use Nette\Database\Connection;
use Nette\Utils\DateTime;

class PostEntity
{
    private Connection $db;
    private int $id;
    private string $content;
    private string $category;
    private string $region;
    private array $tags;
    private array $externalLinks;
    private string $createdAt;

    public function __construct($id, $db)
    {
        $this->db = $db;
        $this->id = $id;
        $this->loadEntity();
    }

    private function loadEntity(): void
    {
        $data = $this->db->fetch('
            SELECT p.content, r.country, c.name as category, p.createdAt
            FROM Posts p
            JOIN Categories c on p.categoryId = c.categoryId
            LEFT JOIN Regions r on p.regionId = r.regionId
            WHERE p.postId = ?', $this->id
        );

        $this->content = $data->content;
        $this->region = $data->country;
        $this->category = $data->category;
        $dateTime = new DateTime($data->createdAt);
        $this->createdAt = $dateTime->format('d.m.Y H:i');
        $this->loadExternalLinks($this->id);
        $this->loadTags($this->id);
    }

    private function loadTags($postId): void
    {
        $this->tags = $this->db->fetchAll('
            SELECT t.tag
            FROM Tags t
            JOIN PostsTags pt on pt.tagId = t.tagId
            WHERE pt.postId = ?', $postId
        );
    }

    private function loadExternalLinks($postId): void
    {
        $this->externalLinks = $this->db->fetchAll('
            SELECT el.label, el.url
            FROM ExternalLinks el
            JOIN PostsExternalLinks pel on pel.extLinkId = el.extLinkId
            WHERE pel.postId = ?', $postId
        );
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return array
     */
    public function getExternalLinks(): array
    {
        return $this->externalLinks;
    }

    /**
     * @return array
     */
    public function getProfiles(): array
    {
        return $this->profiles;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }


}