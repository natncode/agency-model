<?php

declare(strict_types=1);

namespace DC\Model\Entity;

use DC\Model\Repository\TourDateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TourDateRepository::class)
 */
class TourDate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $departureDate;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $returnDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $active = true;

    /**
     * @ORM\ManyToOne(targetEntity=Tour::class, inversedBy="dates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tour;

    /**
     * @ORM\OneToMany(targetEntity=TourFare::class, mappedBy="tourDate", orphanRemoval=true, cascade={"persist"})
     */
    private $fares;

    public function __construct()
    {
        $this->fares = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->returnDate;
    }

    public function setReturnDate(\DateTimeInterface $returnDate): self
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getTour(): ?Tour
    {
        return $this->tour;
    }

    public function setTour(?Tour $tour): self
    {
        $this->tour = $tour;

        return $this;
    }

    /**
     * @return Collection|TourFare[]
     */
    public function getFares(): Collection
    {
        return $this->fares;
    }

    public function addFare(TourFare $fare): self
    {
        if (!$this->fares->contains($fare)) {
            $this->fares[] = $fare;
            $fare->setTourDate($this);
        }

        return $this;
    }

    public function removeFare(TourFare $fare): self
    {
        if ($this->fares->removeElement($fare)) {
            // set the owning side to null (unless already changed)
            if ($fare->getTourDate() === $this) {
                $fare->setTourDate(null);
            }
        }

        return $this;
    }
}
