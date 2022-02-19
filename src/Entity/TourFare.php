<?php

declare(strict_types=1);

namespace DC\Model\Entity;

use DC\Model\Repository\TourFareRepository;
use Doctrine\ORM\Mapping as ORM;
use Stringable;

/**
 * @ORM\Entity(repositoryClass=TourFareRepository::class)
 */
class TourFare implements Stringable
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
    private $lodging;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $specialPrice;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $active = true;

    /**
     * @ORM\ManyToOne(targetEntity=TourDate::class, inversedBy="fares")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tourDate;

    public function __toString(): string
    {
        return (string) $this->getLodging();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLodging(): ?string
    {
        return $this->lodging;
    }

    public function setLodging(string $lodging): self
    {
        $this->lodging = $lodging;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSpecialPrice(): ?int
    {
        return $this->specialPrice;
    }

    public function setSpecialPrice(?int $specialPrice): self
    {
        $this->specialPrice = $specialPrice;

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

    public function getTourDate(): ?TourDate
    {
        return $this->tourDate;
    }

    public function setTourDate(?TourDate $tourDate): self
    {
        $this->tourDate = $tourDate;

        return $this;
    }
}
