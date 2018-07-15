<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Entity\File;

use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnounceRepository")
 * @Vich\Uploadable
 */
class Announce
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Race", inversedBy="announces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CoatColor", inversedBy="announces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $coatColor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CoatStyleColor", inversedBy="announces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $coatStyleColor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Coat", inversedBy="announces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $coat;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $departement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephoneNumber;

    /**
     * @Vich\UploadableField(mapping="announce", fileNameProperty="imgName")
     *
     * @var File
     */
    private $imgFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imgName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    public function getId()
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

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getCoatColor(): ?CoatColor
    {
        return $this->coatColor;
    }

    public function setCoatColor(?CoatColor $coatColor): self
    {
        $this->coatColor = $coatColor;

        return $this;
    }

    public function getCoatStyleColor(): ?CoatStyleColor
    {
        return $this->coatStyleColor;
    }

    public function setCoatStyleColor(?CoatStyleColor $coatStyleColor): self
    {
        $this->coatStyleColor = $coatStyleColor;

        return $this;
    }

    public function getCoat(): ?Coat
    {
        return $this->coat;
    }

    public function setCoat(?Coat $coat): self
    {
        $this->coat = $coat;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(?string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getTelephoneNumber(): ?string
    {
        return $this->telephoneNumber;
    }

    public function setTelephoneNumber(string $telephoneNumber): self
    {
        $this->telephoneNumber = $telephoneNumber;

        return $this;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $img
     *
     * @return Announce
     */
    public function setImgFile(File $img = null)
    {
        $this->imgFile = $img;

        if ($img)
            $this->updatedAt = new \DateTimeImmutable();

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImgFile()
    {
        return $this->imgFile;
    }

    /**
     * @param string $imgName
     *
     * @return Announce
     */
    public function setDevisName($devisName)
    {
        $this->devisName = $devisName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImgName()
    {
        return $this->imgName;
    }
}
