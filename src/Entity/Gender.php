<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenderRepository")
 */
class Gender
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
    private $male;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $female;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Announce", mappedBy="gender")
     */
    private $announces;

    public function __construct()
    {
        $this->announces = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMale(): ?string
    {
        return $this->male;
    }

    public function setMale(string $male): self
    {
        $this->male = $male;

        return $this;
    }

    public function getFemale(): ?string
    {
        return $this->female;
    }

    public function setFemale(string $female): self
    {
        $this->female = $female;

        return $this;
    }

    /**
     * @return Collection|Announce[]
     */
    public function getAnnounces(): Collection
    {
        return $this->announces;
    }

    public function addAnnounce(Announce $announce): self
    {
        if (!$this->announces->contains($announce)) {
            $this->announces[] = $announce;
            $announce->setGender($this);
        }

        return $this;
    }

    public function removeAnnounce(Announce $announce): self
    {
        if ($this->announces->contains($announce)) {
            $this->announces->removeElement($announce);
            // set the owning side to null (unless already changed)
            if ($announce->getGender() === $this) {
                $announce->setGender(null);
            }
        }

        return $this;
    }
}
