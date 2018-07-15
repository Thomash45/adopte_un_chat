<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoatStyleColorRepository")
 */
class CoatStyleColor
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
     * @ORM\OneToMany(targetEntity="App\Entity\Announce", mappedBy="coatStyleColor")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $announce->setCoatStyleColor($this);
        }

        return $this;
    }

    public function removeAnnounce(Announce $announce): self
    {
        if ($this->announces->contains($announce)) {
            $this->announces->removeElement($announce);
            // set the owning side to null (unless already changed)
            if ($announce->getCoatStyleColor() === $this) {
                $announce->setCoatStyleColor(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
