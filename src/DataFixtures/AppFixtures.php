<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Faker\Generator;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class AppFixtures extends Fixture
{

    private Generator $faker;
    
   

 

   
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
      
      
    }
    public function load(ObjectManager $manager): void
    {


        //Users

        for ($i=0; $i < 10 ; $i++) {
            $user = new User();
            $user->setLastname($this->faker->name())
            ->setFirstname($this->faker->name())
            ->setEmail($this->faker->email())
            ->setPhoneNumber($this->faker->phoneNumber())
            ->setAddress($this->faker->address())
            ->setCity($this->faker->city())
            ->setZipcode($this->faker->postcode())
            ->setRoles(['ROLE_USER'])
           ->setPlainPassword('password')
           ->setPassword('password');

            $manager->persist($user);
        }
       
        

        $manager->flush();
    }
}
