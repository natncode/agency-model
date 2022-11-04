<?php

declare(strict_types=1);

namespace DC\Model\Entity;

use DC\Model\Repository\TourActivityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TourActivityRepository::class)
 */
class TourActivity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Tour::class, inversedBy="activities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tour;

    /**
     * @ORM\ManyToOne(targetEntity=ActivityTopic::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $topic;

    public function __toString(): string
    {
        return (string) $this->getDescription();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTour(): ?Tour
    {
        return $this->tour;
    }

    public function setTour(?Tour $tour): self
    {
        $this->tour = $tour;

        return $this;
    }

    public function getTopic(): ?ActivityTopic
    {
        return $this->topic;
    }

    public function setTopic(?ActivityTopic $topic): self
    {
        $this->topic = $topic;

        return $this;
    }
}
