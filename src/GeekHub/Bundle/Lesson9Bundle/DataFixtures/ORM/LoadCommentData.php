<?php

namespace GeekHub\Bundle\Lesson9Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GeekHub\Bundle\Lesson9Bundle\Entity\Comment;
use GeekHub\Bundle\Lesson9Bundle\Entity\Post;
use GeekHub\Bundle\Lesson9Bundle\Entity\Tag;

class LoadCommentData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $comment1 = new Comment();
        $comment1->setText('Comment 1');
        $comment1->setPost($this->getReference('post1'));
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setText('Comment 2');
        $comment2->setPost($this->getReference('post2'));
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setText('Comment 3');
        $comment3->setPost($this->getReference('post2'));
        $manager->persist($comment3);

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 20;
    }
}
