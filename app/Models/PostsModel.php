<?php

namespace App\Models;

use App\Entities\PostEntity;
use Nette\Database\Connection;

class PostsModel
{
    private Connection $db;
    private array $posts;

    /**
     * @param Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }


    public function initPosts(int $limit, int $offset, string $searchText = null): void
    {
        if ($searchText) {
            $rows = $this->db->fetchAll('
            SELECT p.postId FROM Posts p
            WHERE p.content like ?
            ORDER BY p.createdAt DESC
            LIMIT ?
            OFFSET ?
        ', '%'.$searchText.'%', $limit, $offset);
        } else {
            $rows = $this->db->fetchAll('
            SELECT p.postId FROM Posts p
            ORDER BY p.createdAt DESC
            LIMIT ?
            OFFSET ?
        ', $limit, $offset);
        }

        foreach ($rows as $row) {
            $this->posts[$row->postId] = new PostEntity($row->postId, $this->db);
        }
    }

    public function getPostsCount(string $searchText = null): int
    {
        if ($searchText) {
            $res = $this->db->fetch('
            SELECT COUNT(*) as count FROM Posts p
            WHERE p.content like ?
        ', '%'.$searchText.'%');
        } else {
            $res = $this->db->fetch('
            SELECT COUNT(*) as count FROM Posts p
        ');
        }

        return $res->count;
    }

    /**
     * @return array
     */
    public function getPosts(): array
    {
        return $this->posts;
    }
}