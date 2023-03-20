<?php

namespace App\DataFixtures;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;



class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder) 
    {
       $hashedPassword = $encoder->hashPassword(
        $user,
        $plainTextPassword
       )
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
       
        $user = new User();

        $user->setEmail('user@test.com')
             ->setRoles(['ROLE_CLIENT']);
    
        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->flush();
    }
}
