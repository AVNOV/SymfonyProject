<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use App\Entity\Contract;
use App\Entity\ContractType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        $contract = new Contract();
        $contract->setTitle('CDD');

        $contract2 = new Contract();
        $contract2->setTitle('CDI');

        $contract3 = new Contract();
        $contract3->setTitle('free');

        $contractType = new ContractType();
        $contractType->setTitle('temps plein');

        $contractType2 = new ContractType();
        $contractType2->setTitle('temps partiel');

        $manager->persist($contract);
        $manager->persist($contract2);
        $manager->persist($contract3);
        $manager->persist($contractType);
        $manager->persist($contractType2);


        for ($i = 0; $i < 10; $i++) {

            $offre = new Offer();
            $offre->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true))
                ->setDescription($faker->sentence($nbWords = 12, $variableNbWords = true))
                ->setAdresse($faker->streetAddress())
                ->setPostal(intVal($faker->postcode()))
                ->setVille($faker->city())
                ->setCreation($faker->dateTimeBetween('-6 months', 'now'))
                ->setMaj($faker->dateTimeBetween('now', '+1 days'))
                ->setEnd($faker->dateTimeBetween('now', '+6 months'))
                ->setContract($faker->randomElement($array = array($contract, $contract2, $contract3)))
                ->setContractType($faker->randomElement($array = array($contractType, $contractType2)));

            $manager->persist($offre);
        }

        $manager->flush();
    }
}