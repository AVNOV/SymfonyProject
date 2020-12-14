<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use datetime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */
class Offer
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
     * @ORM\Column(type="string", length=255)
     */
    private $Ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Maj;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Creation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $End;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Postal;

    /**
     * @ORM\ManyToOne(targetEntity=Contract::class, inversedBy="Offre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Contract;

    /**
     * @ORM\ManyToOne(targetEntity=ContractType::class, inversedBy="Offer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contractType;

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

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getMaj(): ?\DateTimeInterface
    {
        return $this->Maj;
    }

    public function setMaj(DateTimeInterface $Maj): self
    {
        $this->Maj = $Maj;

        return $this;
    }

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->Creation;
    }

    public function setCreation(DateTimeInterface $Creation): self
    {
        $this->Creation = $Creation;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->End;
    }

    public function setEnd(DateTimeInterface $End): self
    {
        $this->End = $End;

        return $this;
    }

    public function getPostal(): ?string
    {
        return $this->Postal;
    }

    public function setPostal(string $Postal): self
    {
        $this->Postal = $Postal;

        return $this;
    }

    public function getContract(): ?Contract
    {
        return $this->Contract;
    }

    public function setContract(?Contract $Contract): self
    {
        $this->Contract = $Contract;

        return $this;
    }

    public function getContractType(): ?ContractType
    {
        return $this->contractType;
    }

    public function setContractType(?ContractType $contractType): self
    {
        $this->contractType = $contractType;

        return $this;
    }
}
