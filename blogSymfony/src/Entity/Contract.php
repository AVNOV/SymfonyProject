<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContractRepository::class)
 */
class Contract
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
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="Contract", orphanRemoval=true)
     */
    private $Offre;

    public function __construct()
    {
        $this->Offre = new ArrayCollection();
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
    public function getOffre(): Collection
    {
        return $this->Offre;
    }

    public function addOffre(Offer $offre): self
    {
        if (!$this->Offre->contains($offre)) {
            $this->Offre[] = $offre;
            $offre->setContract($this);
        }

        return $this;
    }

    public function removeOffre(Offer $offre): self
    {
        if ($this->Offre->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getContract() === $this) {
                $offre->setContract(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Title;
    }
}
