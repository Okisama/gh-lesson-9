<?php

namespace GeekHub\Bundle\Lesson9Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GeekHub\Bundle\Lesson9Bundle\Entity\Post;
use GeekHub\Bundle\Lesson9Bundle\Entity\Tag;

class LoadTagData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $tag1 = new Tag();
        $tag1->setValue('tag 1');
        $manager->persist($tag1);

        $tag2 = new Tag();
        $tag2->setValue('tag 2');
        $manager->persist($tag2);

        $tag3 = new Tag();
        $tag3->setValue('tag 3');
        $manager->persist($tag3);

        $this->getReference('post1')->addTag($tag1);
        $this->getReference('post1')->addTag($tag2);
        $this->getReference('post2')->addTag($tag2);
        $this->getReference('post3')->addTag($tag1);
        $this->getReference('post5')->addTag($tag3);

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
