<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');


       for($i =1; $i<=30; $i++) {
           $ad = new ad();

           $title = $faker->sentence();
           $coverImage=$faker->imageURL(1000,50);
           $introduction = $faker->paragraph(2);
           $content = '<p>'.join('</p><p>',$faker->paragraphs(5)).'</p>';

           $ad->setTitle($title);
           $ad->setSlug("titre de l'annonce n$i");
           $ad->setCoverImage($coverImage);
           $ad->setIntroduction($introduction);
           $ad->setContent($content);
           $ad->setPrice(mt_rand(40,200));
           $ad->setRooms(mt_rand(1,5));

           $manager->persist($ad);
       }

        $manager->flush();
    }
}
