<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\LatestUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 1; $i < 3; $i++) {
            $product = new LatestUser();
            $product->setUserName('User '.$i);
            $product->setParty_ID();
            $manager->persist($product);
        }

        $manager->flush();
    }
}