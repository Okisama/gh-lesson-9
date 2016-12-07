<?php

namespace GeekHub\Bundle\Lesson9Bundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="GeekHub\Bundle\Lesson9Bundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var Tag[]|ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="GeekHub\Bundle\Lesson9Bundle\Entity\Tag", inversedBy="posts")
     */
    private $tags;

    /**
     * @var Comment[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="GeekHub\Bundle\Lesson9Bundle\Entity\Comment", mappedBy="post")
     */
    private $comments;

    /**
     *
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTitle($value)
    {
        $this->title = $value;

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
     * @param string $value
     *
     * @return $this
     */
    public function setContent($value)
    {
        $this->content = $value;

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
     * @return ArrayCollection|Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param ArrayCollection|Tag[] $value
     *
     * @return $this
     */
    public function setTags($value)
    {
        $this->tags = $value;

        return $this;
    }

    /**
     * @param Tag $value
     *
     * @return $this
     */
    public function addTag($value)
    {
        $this->tags[] = $value;

        return $this;
    }

    /**
     * @param Tag $value
     *
     * @return $this
     */
    public function removeTag($value)
    {
        $this->tags->removeElement($value);

        return $this;
    }

    /**
     * @return ArrayCollection|Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param ArrayCollection|Comment[] $value
     *
     * @return $this
     */
    public function setComments($value)
    {
        $this->comments = $value;

        foreach ($value as $comment) {
            $comment->setPost($this);
        }

        return $this;
    }

    /**
     * @param Comment $value
     *
     * @return $this
     */
    public function addComment($value)
    {
        $this->comments[] = $value;
        $value->setPost($this);

        return $this;
    }

    /**
     * @param Comment $value
     *
     * @return $this
     */
    public function removeComment($value)
    {
        $this->comments->removeElement($value);

        return $this;
    }
}
