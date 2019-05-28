<?php
namespace application\models;

use core\Model;

class Post extends Model {

    protected $_tablename = "posts";

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     * @return Post
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = \DateTime::createFromFormat("Y-m-d H:i:s", $creationDate);
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
     * @return Post
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Methode pour obtenir un sous titre a partir du titre de l'article
     */
    public function getSubTitle(){
        if (strlen($this->getContent()) > 50) {
            $content = substr($this->getContent(), 0, 600);
            $dernier_mot = strrpos($content, "");
            return substr($content, 0, $dernier_mot);
        }
        return "";
    }

    /**
     * Methode pour obtenir un résumé court de l'article
     */
    public function getSumary(){
        if (strlen($this->getContent()) > 50) {
            $content = substr($this->getContent(), 0, 600);
            $dernier_mot = strrpos($content, "");
            return substr($content, 0, $dernier_mot);
        }
        return $this->content;
    }
}