<?php


class Post
{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllPosts(){
        $this->db->query('SELECT *,
                        posts.id as postID,
                        users.id as userID,
                        users.created_at as userCreated
                        FROM posts 
                        INNER JOIN users
                        ON posts.user_id = users.id 
                        ORDER BY posts.created_at DESC');
        $posts = $this->db->getAll();
        if($this->db->rowCount() > 0){
            return $posts;
        } else {
            return false;
        }
    }
}