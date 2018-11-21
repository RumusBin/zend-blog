<?php


namespace Blog\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id")
     */
    protected $id;

    /**
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * @ORM\OneToMany(targetEntity="\Blog\Model\Post", mappedBy="category")
     * @ORM\JoinColumn(name="id", referencedColumnName="category_id")
     */
    protected $posts;

    /**
     * Category constructor.\
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param Post $post | null
     */
    public function addPost(?Post $post)
    {
        $this->posts[] = $post;
    }

    /**
     * @param Post $post
     */
    public function removeTagAssociation($post)
    {
        $this->posts->removeElement($post);
    }

}