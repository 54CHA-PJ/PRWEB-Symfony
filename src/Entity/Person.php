<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Borrow;
use Doctrine\Common\Collections\ArrayCollection; 

#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $person_id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $person_firstname = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $person_lastname = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $person_email = null;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $person_birthdate = null;

    #[ORM\OneToMany(targetEntity: Borrow::class, mappedBy: "person")]
    private $borrows;

    public function __construct()
    {
        $this->borrows = new ArrayCollection();
    }

    public function getPersonId(): ?int
    {
        return $this->person_id;
    }

    public function getPersonFirstname(): ?string
    {
        return $this->person_firstname;
    }

    public function setPersonFirstname(string $person_firstname): self
    {
        $this->person_firstname = $person_firstname;

        return $this;
    }

    public function getPersonLastname(): ?string
    {
        return $this->person_lastname;
    }

    public function setPersonLastname(string $person_lastname): self
    {
        $this->person_lastname = $person_lastname;

        return $this;
    }

    public function getPersonEmail(): ?string
    {
        return $this->person_email;
    }

    public function setPersonEmail(string $person_email): self
    {
        $this->person_email = $person_email;

        return $this;
    }

    public function getPersonBirthdate(): ?\DateTimeInterface
    {
        return $this->person_birthdate;
    }

    public function setPersonBirthdate(\DateTimeInterface $person_birthdate): self
    {
        $this->person_birthdate = $person_birthdate;

        return $this;
    }

    /**
     * @return Collection|Borrow[]
     */
    public function getBorrows(): Collection
    {
        return $this->borrows;
    }

    public function addBorrow(Borrow $borrow): self
    {
        if (!$this->borrows->contains($borrow)) {
            $this->borrows[] = $borrow;
            $borrow->setPerson($this);
        }

        return $this;
    }

    public function removeBorrow(Borrow $borrow): self
    {
        if ($this->borrows->removeElement($borrow)) {
            // set the owning side to null (unless already changed)
            if ($borrow->getPerson() === $this) {
                $borrow->setPerson(null);
            }
        }

        return $this;
    }
}