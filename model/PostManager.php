<?php
require_once ('model/Manager.php');

class PostManager extends Manager
{

    public function getPosts()
    {
        $posts = EntityManager::find(Post::class);
        return $posts;
    }

    public function getPost($postId)
    {
        $post = EntityManager::findOne(Post::class, array("id" => $postId));
        return $post;
    }

    public function insertpost($title, $content)
    {
        $now = new DateTime();
        $data = array(
            "title" => $title,
            "content" => $content,
            "creation_date" => $now->format("Y-m-d H:i:s")
        );
        $post = new Post();
        $addcontents = $post->save($data);

        //$affectedlines
        /*$db = $this->dbConnect();
        $addcontent = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?,?, NOW())');
        $addcontents = $addcontent->execute(array(
            $title,
            $content
        ));*/
        
        return $addcontents;
    }

    public function editionPosts($id, $title, $content)
    {
        $db = $this->dbconnect();
        $inputpost = $db->prepare('UPDATE posts SET title=:title, content=:content WHERE id=:id ');
        $reqs = $inputpost->execute(array(
            'id' => $id,
            'title' => $title,
            'content' => $content
        
        ));
        return $reqs;
    }

    public function supressionPosts($id)
    {
        $db = $this->dbConnect();
        $addcontent = $db->prepare('DELETE FROM posts WHERE id=:id');
        $addcontents = $addcontent->execute(array(
            'id' => $id
        ));
    }
}

