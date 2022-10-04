<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use App\Entity\User;
use App\Entity\Post;
use App\Entity\PostLike;
use App\Entity\PostComment;
use App\Entity\PostCommentLike;
use App\Entity\Story;
use App\Entity\StoryLike;
use Faker\Factory;
use Faker\Generator;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private Generator $faker;
    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->faker = Factory::create('fr_FR');
        $this->userPasswordHasher = $userPasswordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 5; $i++) {
            $arr = array("Particuliers" => "Particuliers", "Formateur" => "Formateur", "Entreprise" => "Entreprise", "Autre organisation" => "Autre organisation");
            $user = new User();
            $user->setEmail($this->faker->email)
                ->setPassword($this->userPasswordHasher->hashPassword($user, 'azerty'))
                ->setName($this->faker->lastName)
                ->setFirstName($this->faker->firstName)
                ->setIsVerified(1)
                ->setStatus(array_rand($arr));
            $manager->persist($user);
        }
        $manager->flush();

        $users = $manager->getRepository(User::class)->findAll();
        foreach ($users as $user) {
            $profil = new Profil();
            $profil->setUser($user)
                ->setFirstname($user->getName())
                ->setLastname($user->getFirstName())
                ->setUpdatedAt(new \DateTimeImmutable())
                ->setAddress($this->faker->address)
                ->setZipCode($this->faker->postcode)
                ->setCountry($this->faker->country)
                ->setStatus($user->getStatus())
                ->setSiret($this->faker->creditcardnumber)
                ->setImageName('web-search-vector-icon-png-253149-6331a52e33534282542452.jpeg');
            $manager->persist($profil);
        }

        $manager->flush();

        for ($i = 1; $i <= 10; $i++) {
            $post = new Post();
            $post->setIdProfil($profil->$idProfil);
            $post->setImageName('web-search-vector-icon-png-253149-6331a52e33534282542452.jpeg')
                ->setUpdatedAt(new \DateTimeImmutable())
                ->setTitle($this->faker->words)
                ->setContent($this->faker->paragraph)
                ->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($post);
        }
        $manager->flush();

        for ($i = 1; $i <= 30; $i++) {
            $postlike = new PostLike();
            $postlike->setIdProfilId($profil->getProfilId());
            $postlike->setIdPostId($post->getPostId());
            $postlike->setIsActive(1);
            $manager->persist($postlike);
        }
        $manager->flush();

        for ($i = 1; $i <= 30; $i++) {
            $postcom = new PostComment();
            $postcom->setIdProfilId($profil->getProfilId())
                ->setIdPostId($post->getPostId())
                ->setContent($this->faker->sentence(3));
            $manager->persist($postcom);
        }
        $manager->flush();

        for ($i = 1; $i <= 30; $i++) {
            $postcomlike = new PostCommentLike();
            $postcomlike->setIdCommentId($postcom->getCommentId());
            $postcomlike->setIsActive(1);
            $manager->persist($postcomlike);
        }
        $manager->flush();

        for ($i = 1; $i <= 5; $i++) {
            $story = new Story();
            $story->setTitle($this->faker->words);
            $story->setContent($this->faker->paragraph);
            $story->setIsActive(1);
            $story->setImageName('web-search-vector-icon-png-253149-6331a52e33534282542452.jpeg');
            $manager->persist($story);
        }
        $manager->flush();

        for ($usr = 1; $usr <= 5; $usr++) {
            $storylike = new StoryLike();
            $storylike->setIdStoryId($story->getStoryId());
            $storylike->setIsActive(1);
            $manager->persist($storylike);
        }
        $manager->flush();
    }
}
