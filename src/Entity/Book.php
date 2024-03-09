<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $book_id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $book_title = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $book_author = null;

    public function getBookId(): ?int
    {
        return $this->book_id;
    }

    public function getBookTitle(): ?string
    {
        return $this->book_title;
    }

    public function setBookTitle(string $book_title): self
    {
        $this->book_title = $book_title;

        return $this;
    }

    public function getBookAuthor(): ?string
    {
        return $this->book_author;
    }

    public function setBookAuthor(string $book_author): self
    {
        $this->book_author = $book_author;

        return $this;
    }
}