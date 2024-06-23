<?php

namespace App\DataFixtures;

use App\Entity\Thematique;
use App\Factory\ThematiqueFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ThematiqueFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = json_decode(file_get_contents(__DIR__.'/data/thematiques.json'), true);

        foreach ($data as $thematiqueData) {
            $thematique = new Thematique();
            $thematique->setLibelle($thematiqueData['libelle']);
            $thematique->setDescription($thematiqueData['description'] ?? null);
            $manager->persist($thematique);
        }

        $manager->flush();
    }
}
