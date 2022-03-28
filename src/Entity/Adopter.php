<?php

namespace App\Entity;

use App\Repository\AdopterRepository;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity(repositoryClass=AdopterRepository::class)
 * @Vich\Uploadable
 */
class Adopter
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
     * @ORM\Column(type="string", length=1000)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
      * @Vich\UploadableField(mapping="adopters_file", fileNameProperty="picture")
      * @Assert\File(
      * maxSize = "1M",
      * maxSizeMessage = "Le fichier est trop lourd",
      * mimeTypes = {"image/jpeg", "image/png", "image/webp", "image/jp2"},
      * mimeTypesMessage = "Upload de fichier PDF JPEG ou JPG valide"
      * )
      * @var File
      */
    private $adoptersFile;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isValid = false;

    /**
     * @ORM\Column(type="datetime")
     */
    private $captureAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $adoptionDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    /**
     * Get the value of adoptersFile
     *
     * @return  File
     */ 
    public function getAdoptersFile()
    {
        return $this->adoptersFile;
    }

    /**
     * Set the value of adoptersFile
     *
     * @param  File  $adoptersFile
     *
     * @return  self
     */ 
    public function setAdoptersFile(File $adoptersFile)
    {
        $this->adoptersFile = $adoptersFile;

        return $this;
    }

    public function getIsValid(): ?bool
    {
        return $this->isValid;
    }

    public function setIsValid(bool $isValid): self
    {
        $this->isValid = $isValid;

        return $this;
    }

    public function getCaptureAt(): ?\DateTimeInterface
    {
        return $this->captureAt;
    }

    public function setCaptureAt(\DateTimeInterface $captureAt): self
    {
        $this->captureAt = $captureAt;

        return $this;
    }

    public function getAdoptionDate(): ?\DateTimeInterface
    {
        return $this->adoptionDate;
    }

    public function setAdoptionDate(\DateTimeInterface $adoptionDate): self
    {
        $this->adoptionDate = $adoptionDate;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
