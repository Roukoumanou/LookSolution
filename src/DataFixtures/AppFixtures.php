<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $user = new User();
        // On crée un administrateur
        $user->setEmail("admin@test.com")
             ->setRoles(["ROLE_ADMIN"])
             ->setFirstName("Look")
             ->setLastName("Solution")
             ->setPassword($this->encoder->encodePassword($user, "password"));

        $manager->persist($user);

        $manager->flush();
    }
}
