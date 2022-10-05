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

        $profils = $manager->getRepository(Profil::class)->findAll();
        for ($i = 0; $i <= 5; $i++) {
            foreach ($profils as $profilUnique) {
                $post = new Post();
                $post->setIdProfil($profilUnique)
                    ->setTitle($this->faker->sentence(4))
                    ->setContent($this->faker->paragraph)
                    ->setUpdatedAt(new \DateTimeImmutable())
                    ->setCreatedAt($this->faker->dateTimeBetween('-6 months'))
                    ->setImageName('postArticle.jpeg');
                $manager->persist($post);
            }
        }
        $manager->flush();

        $posts = $manager->getRepository(Post::class)->findAll();
        for ($i = 1; $i <= 30; $i++) {
            foreach ($posts as $postUnique) {
                $postlike = new PostLike();
                $postlike->setIdProfil($postUnique)
                    ->setIdPost($postUnique)
                    ->setIsActive(1);
                $manager->persist($postlike);
            }
        }

        $manager->flush();

        $postComs = $manager->getRepository(Post::class)->findAll();
        for ($i = 1; $i <= 30; $i++) {
            foreach ($postComs as $postComUnique) {
                $postcom = new PostComment();
                $postcom->setIdProfil($postComUnique)
                    ->setIdPost($postComUnique)
                    ->setContent($this->faker->sentence(3));
                $manager->persist($postcom);
            }
        }
        $manager->flush();

        $postComlikes = $manager->getRepository(Post::class)->findAll();
        for ($i = 1; $i <= 30; $i++) {
            foreach ($postComlikes as $postComLikeUnique) {
                $postcomlike = new PostCommentLike();
                $postcomlike->setIdComment($postComLikeUnique)
                    ->setIsActive(1);
                $manager->persist($postcomlike);
            }
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

        $postlikes = $manager->getRepository(Story::class)->findAll();
        for ($i = 1; $i <= 5; $i++) {
            foreach ($postlikes as $postLikeUnique) {
                $storylike = new StoryLike();
                $storylike->setIdStory($postLikeUnique)
                    ->setIsActive(1);
                $manager->persist($storylike);
            }
        }
        $manager->flush();
    }
}
