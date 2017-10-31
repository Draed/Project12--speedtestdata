<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\LatestUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 3; $i++) {
            $product = new LatestUser();
            $product->setUserName('User '.$i);
            $Id = '0003' + $i;
            $product->setPartyId($Id);
            $manager->persist($product);
        }

        $manager->flush();
    }
}