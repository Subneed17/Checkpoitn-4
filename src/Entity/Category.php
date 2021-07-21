<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dog;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $other;

    /**
     * @ORM\OneToMany(targetEntity=Animaux::class, mappedBy="category")
     */
    private $animals;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDog(): ?string
    {
        return $this->dog;
    }

    public function setDog(string $dog): self
    {
        $this->dog = $dog;

        return $this;
    }

    public function getCat(): ?string
    {
        return $this->cat;
    }

    public function setCat(string $cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    public function getOther(): ?string
    {
        return $this->other;
    }

    public function setOther(string $other): self
    {
        $this->other = $other;

        return $this;
    }

    /**
     * @return Collection|Animaux[]
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animaux $animal): self
    {
        if (!$this->animals->contains($animal)) {
            $this->animals[] = $animal;
            $animal->setCategory($this);
        }

        return $this;
    }

    public function removeAnimal(Animaux $animal): self
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getCategory() === $this) {
                $animal->setCategory(null);
            }
        }

        return $this;
    }
}
