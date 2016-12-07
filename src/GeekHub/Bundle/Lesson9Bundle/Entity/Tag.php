<?php

namespace GeekHub\Bundle\Lesson9Bundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="GeekHub\Bundle\Lesson9Bundle\Repository\TagRepository")
 */
class Tag
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
     * @ORM\Column(name="text", type="string", length=255, unique=true)
     */
    private $value;

    /**
     * @var Post[]|ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="GeekHub\Bundle\Lesson9Bundle\Entity\Post", mappedBy="tags")
     */
    private $posts;

    /**
     *
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
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
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return ArrayCollection|Post[]
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param ArrayCollection|Post[] $value
     *
     * @return $this
     */
    public function setPosts($value)
    {
        $this->posts = $value;

        foreach ($value as $post) {
            $post->addTag($this);
        }

        return $this;
    }

    /**
     * @param Post $value
     *
     * @return $this
     */
    public function addPost($value)
    {
        $this->posts[] = $value;
        $value->addTag($this);

        return $this;
    }

    /**
     * @param Post $value
     *
     * @return $this
     */
    public function removePost($value)
    {
        $this->posts->removeElement($value);

        return $this;
    }
}
