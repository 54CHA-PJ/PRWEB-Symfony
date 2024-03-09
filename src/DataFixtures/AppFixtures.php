<?php

namespace App\DataFixtures;

use App\Entity\Person;
use App\Entity\Book;
use App\Entity\Borrow;
use App\Repository\PersonRepository;
use App\Repository\BookRepository;
use App\Repository\BorrowRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager; 

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $people = [
            ['Elon', 'Musk', '1971-06-28'],
            ['Mark', 'Zuckerberg', '1984-05-14'],
            ['Bill', 'Gates', '1955-10-28']
        ];

        foreach ($people as $index => $aPerson) {
            $aDate = \DateTime::createFromFormat('Y-m-d', $aPerson[2]);
            $person = new Person(); // Create object
            $person->setPersonFirstname($aPerson[0]);
            $person->setPersonLastName($aPerson[1]);
            $person->setPersonBirthdate($aDate);
            $manager->persist($person); // save object to database
            $people[$index]['object'] = $person; // Keep created object for future use
        }

        $manager->flush();
    }
}
