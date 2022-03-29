<?php

namespace App\Entity;

use App\Repository\BenevoleRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=BenevoleRepository::class)
 * @Vich\Uploadable
 */
class Benevole
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
      * @Vich\UploadableField(mapping="benevole_file", fileNameProperty="picture")
      * @var File
      */
    private $benevoleFile;

    /**
     * @ORM\Column(type="date")
     */
    private $CaptureAt;


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

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCaptureAt(): ?\DateTimeInterface
    {
        return $this->CaptureAt;
    }

    public function setCaptureAt( \DateTimeInterface $CaptureAt): self
    {
        $this->CaptureAt = $CaptureAt;

        return $this;
    }

    /**
     * Get the value of BenevoleFile
     *
     * @return  File
     */
    public function getBenevoleFile()
    {
        return $this->benevoleFile;
    }

    /**
     * Set the value of BenevoleFile
     *
     * @param  File  $benevoleFile
     *
     * @return  self
     */
    public function setBenevoleFile(File $benevoleFile)
    {
        $this->benevoleFile = $benevoleFile;

        return $this;
    }
}
