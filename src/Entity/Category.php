<?php

declare(strict_types=1);

namespace DC\Model\Entity;

use DC\Model\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category implements \Stringable, Sluggable
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
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $active = true;

    /**
     * @ORM\OneToMany(targetEntity=Tour::class, mappedBy="thematic")
     */
    private $toursByThematic;

    /**
     * @ORM\OneToMany(targetEntity=Tour::class, mappedBy="duration")
     */
    private $toursByDuration;

    /**
     * @ORM\OneToOne(targetEntity=Category::class, cascade={"persist", "remove"})
     */
    private $parent;

    public function __construct()
    {
        $this->toursByThematic = new ArrayCollection();
        $this->toursByDuration = new ArrayCollection();
    }

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

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

    public function __toString(): string
    {
        return (string) $this->getName();
    }

    /**
     * @return Collection|Tour[]
     */
    public function getToursByThematic(): Collection
    {
        return $this->toursByThematic;
    }

    public function addToursByThematic(Tour $toursByThematic): self
    {
        if (!$this->toursByThematic->contains($toursByThematic)) {
            $this->toursByThematic[] = $toursByThematic;
            $toursByThematic->setThematic($this);
        }

        return $this;
    }

    public function removeToursByThematic(Tour $toursByThematic): self
    {
        if ($this->toursByThematic->removeElement($toursByThematic)) {
            // set the owning side to null (unless already changed)
            if ($toursByThematic->getThematic() === $this) {
                $toursByThematic->setThematic(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tour[]
     */
    public function getToursByDuration(): Collection
    {
        return $this->toursByDuration;
    }

    public function addToursByDuration(Tour $toursByDuration): self
    {
        if (!$this->toursByDuration->contains($toursByDuration)) {
            $this->toursByDuration[] = $toursByDuration;
            $toursByDuration->setDuration($this);
        }

        return $this;
    }

    public function removeToursByDuration(Tour $toursByDuration): self
    {
        if ($this->toursByDuration->removeElement($toursByDuration)) {
            // set the owning side to null (unless already changed)
            if ($toursByDuration->getDuration() === $this) {
                $toursByDuration->setDuration(null);
            }
        }

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
