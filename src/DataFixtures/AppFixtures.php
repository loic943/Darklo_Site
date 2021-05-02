<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Commentaire;
use App\Entity\News;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        // Création d'un admin
        $admin = new User();
        $password = $this->encoder->encodePassword($admin, 'pass');
        $admin->setEmail('admin@darklo.fr')
            ->setPseudo($faker->userName())
            ->setRoles(['admin'])
            ->setTel($faker->phoneNumber())
            ->setAdresse($faker->city())
            ->setPassword($password)
            ->setAvatar($faker->imageUrl(80, 80, 'human', true));
        $manager->persist($admin);

        // Création d'un user
        $user = new User();
        $password = $this->encoder->encodePassword($user, 'pass');
        $user->setEmail('user@darklo.fr')
            ->setPseudo($faker->userName())
            ->setRoles(['user'])
            ->setTel($faker->phoneNumber())
            ->setAdresse($faker->city())
            ->setPassword($password)
            ->setAvatar($faker->imageUrl(80, 80, 'human', true));
        $manager->persist($user);

        // Création d'une catégorie pout les tests fonctionnels
        $categorieTest = new Categorie();
        $categorieTest->setNom('categorieTest')
                ->setSlug('categorie-test')
                ->setDescription('categorie de test');
        $manager->persist($categorieTest);

        // Création d'un post pour les tests fonctionnels
        $postTest = new News();
        $postTest->setTitre('Titre Test')
                ->setSlug('Titre-test-slug')
                ->setImage('https://loremflickr.com/750/300?random=1')
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setContenu('Faux contenu de test')
                ->setPublie(1)
                ->setUser($admin)
                ->addCategorie($categorieTest);
        $manager->persist($postTest);

        //Création d'un commentaire pour les test fonctionnels
        $commentaireTest = new Commentaire();
        $commentaireTest->setUser($admin)
            ->setTitre('Commentaire de test')
            ->setContenu('Commentaire pour les tests fonctionnels')
            ->setCreatedAt($faker->dateTimeBetween('-30 days', 'now'))
            ->setNews($postTest);
        $manager->persist($commentaireTest);

        // Création des fausses catégories
        for ($j = 0; $j < 5; $j++) {
            $categorie = new Categorie();
            $categorie->setNom($faker->word())
                ->setSlug($faker->slug(2, false))
                ->setDescription($faker->words(5, true));
            $manager->persist($categorie);

            // Création de faux posts
            for ($i = 0; $i < 2; $i++) {
                $post = new News();
                $post->setTitre($faker->words(3, true))
                    ->setSlug($faker->slug(3, false))
                    ->setImage('https://loremflickr.com/750/300?random=' . $i)
                    ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setContenu($faker->text(400))
                    ->setPublie($faker->boolean())
                    ->setUser($admin)
                    ->addCategorie($categorie);
                $manager->persist($post);

                // Création de faux commentaires
                for ($k = 0; $k < 2; $k++) {
                    $commentaire = new Commentaire();
                    $commentaire->setUser($faker->randomElement([$user, $admin]))
                            ->setTitre($faker->words(3, true))
                            ->setContenu($faker->text(100))
                            ->setCreatedAt($faker->dateTimeBetween('-30 days', 'now'))
                            ->setNews($post);
                    $manager->persist($commentaire);
                }
            }
        }

        $manager->flush();
    }
}
