<?php
namespace application\models;

use core\Model;

class Comment extends Model {

    protected $_tablename = "comments";

    /**
     * @var integer
     */
    private $id;

    /**
     * @var Post
     */
    private $post;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \DateTime
     */
    private $commentDate;

    /**
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param \DateTime $commentDate
     * @return Comment
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = \DateTime::createFromFormat("Y-m-d H:i:s", $commentDate);
        return $this;
    }

    /**
     *
     * @return integer
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param integer $id
     * @return Comment
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Comment
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param Post $post
     * @return Comment
     */
    public function setPost($post)
    {
        $this->post = $post;
        return $this;
    }
}