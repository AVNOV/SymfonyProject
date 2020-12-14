<?php

namespace App\Entity;

use App\Repository\ContractTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContractTypeRepository::class)
 */
class ContractType
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
    private $Title;

    /**
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="contractType")
     */
    private $Offer;

    public function __construct()
    {
        $this->Offer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    /**
     * @return Collection|Offer[]
     */
    public function getOffer(): Collection
    {
        return $this->Offer;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->Offer->contains($offer)) {
            $this->Offer[] = $offer;
            $offer->setContractType($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->Offer->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getContractType() === $this) {
                $offer->setContractType(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Title;
    }
}
