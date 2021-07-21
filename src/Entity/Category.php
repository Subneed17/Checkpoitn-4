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
     * @ORM\OneToMany(targetEntity=Animaux::class, mappedBy="category")
     */
    private $animals;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
