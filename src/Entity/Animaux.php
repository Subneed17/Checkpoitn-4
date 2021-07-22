<?php

namespace App\Entity;

use App\Repository\AnimauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimauxRepository::class)
 */
class Animaux
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $race;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vaccinate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sterilized;

    /**
     * @ORM\Column(type="boolean")
     */
    private $puced;

    /**
     * @ORM\Column(type="boolean")
     */
    private $castration;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="animals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Message::class, mappedBy="animaux")
     */
    private $messages;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getVaccinate(): ?bool
    {
        return $this->vaccinate;
    }

    public function setVaccinate(bool $vaccinate): self
    {
        $this->vaccinate = $vaccinate;

        return $this;
    }

    public function getSterilized(): ?bool
    {
        return $this->sterilized;
    }

    public function setSterilized(bool $sterilized): self
    {
        $this->sterilized = $sterilized;

        return $this;
    }

    public function getPuced(): ?bool
    {
        return $this->puced;
    }

    public function setPuced(bool $puced): self
    {
        $this->puced = $puced;

        return $this;
    }

    public function getCastration(): ?bool
    {
        return $this->castration;
    }

    public function setCastration(bool $castration): self
    {
        $this->castration = $castration;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->addAnimaux($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            $message->removeAnimaux($this);
        }

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }
}
