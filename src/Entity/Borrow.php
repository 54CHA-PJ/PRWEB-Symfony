<?php

namespace App\Entity;

use App\Entity\Person;
use App\Entity\Book;

use App\Repository\BorrowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BorrowRepository::class)]
class Borrow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $borrow_id = null;

    #[ORM\ManyToOne(targetEntity: Person::class, inversedBy: "borrows")]
    #[ORM\JoinColumn(name: "person_id", referencedColumnName: "person_id", nullable: false)]
    private $person;

    #[ORM\ManyToOne(targetEntity: Book::class)]
    #[ORM\JoinColumn(name: "book_id", referencedColumnName: "book_id", nullable: false)]
    private $book;

    #[ORM\Column(type: "datetime")]
    private $borrow_date;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $return_date;

    public function getBorrowId(): ?int
    {
        return $this->borrow_id;
    }

    public function setBorrowId(int $borrow_id): static
    {
        $this->borrow_id = $borrow_id;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getBorrowDate(): ?\DateTimeInterface
    {
        return $this->borrow_date;
    }

    public function setBorrowDate(\DateTimeInterface $borrow_date): self
    {
        $this->borrow_date = $borrow_date;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->return_date;
    }

    public function setReturnDate(?\DateTimeInterface $return_date): self
    {
        $this->return_date = $return_date;

        return $this;
    }
}