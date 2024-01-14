<?php

namespace App\Model;

use PDO;
use PDOException;

class WikiModel extends Crud
{
    public function fetchCategories()
    {
        $tablename = 'category';
        return $this->read($tablename);
    }
    public function CreateWiki($table, $data, $tags)
    {
        // var_dump($data);
        try {
            $this->create($table, $data);
            $wikiId = $this->pdo->lastInsertId();
            $tagIds = [];
            foreach ($tags as $tag) {
                $tag = trim($tag);

                // Check if the tag already exists
                $tagExistsQuery = "SELECT id FROM tags WHERE name = :tag";
                $tagStmt = $this->pdo->prepare($tagExistsQuery);
                $tagStmt->bindParam(':tag', $tag);
                $tagStmt->execute();
                $tagResult = $tagStmt->fetch(PDO::FETCH_ASSOC);

                if ($tagResult) {
                    // Tag already exists, get its ID
                    $tagIds[] = $tagResult['id'];
                } else {
                    // Tag does not exist, add it to the tags table
                    $addTagQuery = "INSERT INTO tags (name) VALUES (:tag)";
                    $addTagStmt = $this->pdo->prepare($addTagQuery);
                    $addTagStmt->bindParam(':tag', $tag);
                    $addTagStmt->execute();

                    // Get the ID of the newly added tag
                    $tagIds[] = $this->pdo->lastInsertId();
                }
            }

            // Add wiki-tag relationships
            foreach ($tagIds as $tagId) {
                $addWikiTagQuery = "INSERT INTO wiki_tag (tag_id, wiki_id) VALUES (:tag_id, :wiki_id)";
                $addWikiTagStmt = $this->pdo->prepare($addWikiTagQuery);
                $addWikiTagStmt->bindParam(':tag_id', $tagId);
                $addWikiTagStmt->bindParam(':wiki_id', $wikiId);
                $addWikiTagStmt->execute();
            }
        } catch (PDOException $e) {
            echo "Error inserting wiki with tags: " . $e->getMessage();
        }
    }
    public function fetchWikis()
    {
        try {
            $query = " SELECT w.id, w.title, w.description, w.creation_date, w.content, w.status, u.user_name AS author, c.name FROM `wiki` w
            INNER JOIN user u ON w.author_id = u.id 
            INNER JOIN category c ON w.category_id = c.id";
            $stmt = $this->pdo->query($query);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function approveWiki($id)
    {
        try {
            $query = "UPDATE wiki SET status = 'approved' WHERE id = $id";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function denyWiki($id)
    {
        try {
            $query = "UPDATE wiki SET status = 'denied' WHERE id = $id";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function deleteWiki($id)
    {
        try {
            $query = "UPDATE wiki SET status = 'deleted' WHERE id = $id";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function archiveWiki($id)
    {
        try {
            $query = "UPDATE wiki SET status = 'archived' WHERE id = $id";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }

    public function updateWiki($data, $id)
    {
        $tablename = 'wiki';
        $this->update($tablename, $data, $id);
    }

    public function fetchSingleWiki($id)
    {
        $tablename = 'wiki';
        $data = $this->getRecordById($tablename, $id);
        $author_id = $data['author_id'];
        $query = "SELECT user_name FROM user WHERE id = $author_id";
        $stmt = $this->pdo->query($query);
        $records = $stmt->fetch(PDO::FETCH_ASSOC);
        $data['author_id'] = $records['user_name'];
        return $data;
    }

    public function fetcApprovedhWikis()
    {
        try {
            $query = " SELECT w.id, w.title, w.description, w.creation_date, w.content, w.status, u.user_name AS author, u.profile_picture AS profile, c.name FROM `wiki` w
            INNER JOIN user u ON w.author_id = u.id 
            INNER JOIN category c ON w.category_id = c.id
            WHERE w.status = 'approved'";
            $stmt = $this->pdo->query($query);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function search($input)
    {
        try {
            $query = " SELECT w.id, w.title, w.description, w.creation_date, w.content, w.status, u.user_name AS author, u.profile_picture AS profile, c.name FROM `wiki` w
            INNER JOIN user u ON w.author_id = u.id 
            INNER JOIN category c ON w.category_id = c.id
            WHERE w.status = 'approved' AND w.title LIKE '%$input%' ";
            $stmt = $this->pdo->query($query);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function WikiTags($id)
    {
        try {
            $query = "SELECT p.tag_id, p.wiki_id, t.name FROM wiki_tag p
            INNER JOIN tags t ON p.tag_id = t.id
            WHERE p.wiki_id = $id";
            $stmt = $this->pdo->query($query);
            $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $tags;
        } catch (PDOException $e) {
            die("ERROR: Could not execute $query. " . $e->getMessage());
        }
    }
}
