<?php

namespace App\DataFixtures;

use App\Entity\Person;
use App\Entity\Book;
use App\Entity\Borrow;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager; 

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $people = [
            ['Elon', 'Musk', 'elon.musk@example.com', '1971-06-28'],
            ['Mark', 'Zuckerberg', 'mark.zuckerberg@example.com', '1984-05-14'],
            ['Bill', 'Gates', 'bill.gates@example.com', '1955-10-28']
        ];

        $books = [
            ['Uzumaki', 'Junji Ito'],
            ['Gyo', 'Junji Ito'],
            ['Tomie', 'Junji Ito'],
            ['The Holy Bible', 'God'],
            ['The Quran', 'God']
        ];

        $borrows = [
            [2, 4, '2021-07-15', '2021-09-01'],
            [1, 2, '2021-08-01', NULL],
            [3, 3, '2021-10-01', NULL],
            [2, 1, '2021-10-02', NULL]
        ];

        foreach ($people as $index => $aPerson) {
            $aDate = \DateTime::createFromFormat('Y-m-d', $aPerson[3]);
            $person = new Person(); // Create object
            $person->setPersonFirstname($aPerson[0]);
            $person->setPersonLastname($aPerson[1]);
            $person->setPersonEmail($aPerson[2]); // Set email
            $person->setPersonBirthdate($aDate);
            $manager->persist($person); // save object to database
            $people[$index]['object'] = $person; // Keep created object for future use
        }

        foreach ($books as $index => $aBook) {
            $book = new Book(); // Create object
            $book->setBookTitle($aBook[0]);
            $book->setBookAuthor($aBook[1]);
            $manager->persist($book); // save object to database
            $books[$index]['object'] = $book; // Keep created object for future use
        }

        foreach ($borrows as $index => $aBorrow) {
            $borrow = new Borrow();
            $borrow->setPerson($people[$aBorrow[0]-1]['object']);
            $borrow->setBook($books[$aBorrow[1]-1]['object']);
            $aDate = \DateTime::createFromFormat('Y-m-d', $aBorrow[2]);
            $borrow->setBorrowDate($aDate);
            if ($aBorrow[3] != NULL) {
                $aDate = \DateTime::createFromFormat('Y-m-d', $aBorrow[3]);
                $borrow->setReturnDate($aDate); // Changed from setBorrowReturn to setReturnDate
            }
            $manager->persist($borrow);
        }

        $manager->flush();
    }
}