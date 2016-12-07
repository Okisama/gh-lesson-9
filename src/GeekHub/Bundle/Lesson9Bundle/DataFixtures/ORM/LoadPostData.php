<?php

namespace GeekHub\Bundle\Lesson9Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GeekHub\Bundle\Lesson9Bundle\Entity\Post;

class LoadPostData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 5; $i++) {
            $post = new Post();
            $post
                ->setTitle("Post {$i}")
                ->setContent("Content of post {$i}")
            ;
            $manager->persist($post);
            $this->addReference("post{$i}", $post);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 10;
    }
}
