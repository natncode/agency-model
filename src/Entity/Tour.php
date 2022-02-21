<?php

declare(strict_types=1);

namespace DC\Model\Entity;

use DC\Model\Repository\TourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TourRepository::class)
 */
class Tour implements \Stringable, Sluggable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="uuid")
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secundaryName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $map;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mainImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $catalogImage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $usualDaysDuration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minimumGroupSize;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maximumGroupSize;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $suggestedMinimumAge;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $suggestedMaximumAge;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minimumOccupiedPlacesToGo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minimumQuota;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $departureWeekDay;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $arrivalWeekDay;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $departureTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $departurePlace;

    /**
     * @ORM\Column(type="boolean")
     */
    private $allowCustomSchedule;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $active = false;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Region::class)
     * @ORM\JoinTable(name="extended_by")
     */
    private $regions;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class)
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=TourDetail::class)
     * @ORM\JoinTable(name="included_details")
     */
    private $includedDetails;

    /**
     * @ORM\ManyToMany(targetEntity=TourDetail::class)
     * @ORM\JoinTable(name="non_included_details")
     */
    private $nonIncludedDetails;

    /**
     * @ORM\OneToMany(targetEntity=TourImage::class, mappedBy="tour", cascade={"persist"}, orphanRemoval=true)
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=TourActivity::class, mappedBy="tour", cascade={"persist"}, orphanRemoval=true)
     */
    private $activities;

    /**
     * @ORM\OneToMany(targetEntity=TourDate::class, mappedBy="tour", orphanRemoval=true, cascade={"persist"})
     */
    private $dates;

    /**
     * @ORM\OneToMany(targetEntity=TourHighlight::class, mappedBy="tour", orphanRemoval=true, cascade={"persist"})
     */
    private $highlights;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="toursByThematic")
     * @ORM\JoinColumn(nullable=false)
     */
    private $thematic;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $duration;

    public function __toString(): string
    {
        return (string) ($this->getSecundaryName() ?? $this->getName());
    }

    public function __construct()
    {
        $this->regions = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->includedDetails = new ArrayCollection();
        $this->nonIncludedDetails = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->activities = new ArrayCollection();
        $this->dates = new ArrayCollection();
        $this->highlights = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($uuid): self
    {
        $this->uuid = $uuid;

        return $this;
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

    public function getSecundaryName(): ?string
    {
        return $this->secundaryName;
    }

    public function setSecundaryName(string $secundaryName): self
    {
        $this->secundaryName = $secundaryName;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMap(): ?string
    {
        return $this->map;
    }

    public function setMap(?string $map): self
    {
        $this->map = $map;

        return $this;
    }

    public function getMainImage(): ?string
    {
        return $this->mainImage;
    }

    public function setMainImage(string $mainImage): self
    {
        $this->mainImage = $mainImage;

        return $this;
    }

    public function getCatalogImage(): ?string
    {
        return $this->catalogImage;
    }

    public function setCatalogImage(string $catalogImage): self
    {
        $this->catalogImage = $catalogImage;

        return $this;
    }

    public function getUsualDaysDuration(): ?int
    {
        return $this->usualDaysDuration;
    }

    public function setUsualDaysDuration(int $usualDaysDuration): self
    {
        $this->usualDaysDuration = $usualDaysDuration;

        return $this;
    }

    public function getMinimumGroupSize(): ?int
    {
        return $this->minimumGroupSize;
    }

    public function setMinimumGroupSize(?int $minimumGroupSize): self
    {
        $this->minimumGroupSize = $minimumGroupSize;

        return $this;
    }

    public function getMaximumGroupSize(): ?int
    {
        return $this->maximumGroupSize;
    }

    public function setMaximumGroupSize(?int $maximumGroupSize): self
    {
        $this->maximumGroupSize = $maximumGroupSize;

        return $this;
    }

    public function getSuggestedMinimumAge(): ?int
    {
        return $this->suggestedMinimumAge;
    }

    public function setSuggestedMinimumAge(?int $suggestedMinimumAge): self
    {
        $this->suggestedMinimumAge = $suggestedMinimumAge;

        return $this;
    }

    public function getSuggestedMaximumAge(): ?int
    {
        return $this->suggestedMaximumAge;
    }

    public function setSuggestedMaximumAge(?int $suggestedMaximumAge): self
    {
        $this->suggestedMaximumAge = $suggestedMaximumAge;

        return $this;
    }

    public function getMinimumOccupiedPlacesToGo(): ?int
    {
        return $this->minimumOccupiedPlacesToGo;
    }

    public function setMinimumOccupiedPlacesToGo(?int $minimumOccupiedPlacesToGo): self
    {
        $this->minimumOccupiedPlacesToGo = $minimumOccupiedPlacesToGo;

        return $this;
    }

    public function getMinimumQuota(): ?int
    {
        return $this->minimumQuota;
    }

    public function setMinimumQuota(?int $minimumQuota): self
    {
        $this->minimumQuota = $minimumQuota;

        return $this;
    }

    public function getDepartureWeekDay(): ?string
    {
        return $this->departureWeekDay;
    }

    public function setDepartureWeekDay(?string $departureWeekDay): self
    {
        $this->departureWeekDay = $departureWeekDay;

        return $this;
    }

    public function getArrivalWeekDay(): ?string
    {
        return $this->arrivalWeekDay;
    }

    public function setArrivalWeekDay(?string $arrivalWeekDay): self
    {
        $this->arrivalWeekDay = $arrivalWeekDay;

        return $this;
    }

    public function getDepartureTime(): ?string
    {
        return $this->departureTime;
    }

    public function setDepartureTime(?string $departureTime): self
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    public function getDeparturePlace(): ?string
    {
        return $this->departurePlace;
    }

    public function setDeparturePlace(?string $departurePlace): self
    {
        $this->departurePlace = $departurePlace;

        return $this;
    }

    public function getAllowCustomSchedule(): ?bool
    {
        return $this->allowCustomSchedule;
    }

    public function setAllowCustomSchedule(bool $allowCustomSchedule): self
    {
        $this->allowCustomSchedule = $allowCustomSchedule;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Region[]
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(Region $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
        }

        return $this;
    }

    public function removeRegion(Region $region): self
    {
        $this->regions->removeElement($region);

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection|TourDetail[]
     */
    public function getIncludedDetails(): Collection
    {
        return $this->includedDetails;
    }

    public function addIncludedDetail(TourDetail $includedDetail): self
    {
        if (!$this->includedDetails->contains($includedDetail)) {
            $this->includedDetails[] = $includedDetail;
        }

        return $this;
    }

    public function removeIncludedDetail(TourDetail $includedDetail): self
    {
        $this->includedDetails->removeElement($includedDetail);

        return $this;
    }

    /**
     * @return Collection|TourDetail[]
     */
    public function getNonIncludedDetails(): Collection
    {
        return $this->nonIncludedDetails;
    }

    public function addNonIncludedDetail(TourDetail $nonIncludedDetail): self
    {
        if (!$this->nonIncludedDetails->contains($nonIncludedDetail)) {
            $this->nonIncludedDetails[] = $nonIncludedDetail;
        }

        return $this;
    }

    public function removeNonIncludedDetail(TourDetail $nonIncludedDetail): self
    {
        $this->nonIncludedDetails->removeElement($nonIncludedDetail);

        return $this;
    }

    /**
     * @return Collection|TourImage[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(TourImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setTour($this);
        }

        return $this;
    }

    public function removeImage(TourImage $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getTour() === $this) {
                $image->setTour(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TourActivity[]
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(TourActivity $activity): self
    {
        if (!$this->activities->contains($activity)) {
            $this->activities[] = $activity;
            $activity->setTour($this);
        }

        return $this;
    }

    public function removeActivity(TourActivity $activity): self
    {
        if ($this->activities->removeElement($activity)) {
            // set the owning side to null (unless already changed)
            if ($activity->getTour() === $this) {
                $activity->setTour(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TourDate[]
     */
    public function getDates(): Collection
    {
        return $this->dates;
    }

    public function addDate(TourDate $date): self
    {
        if (!$this->dates->contains($date)) {
            $this->dates[] = $date;
            $date->setTour($this);
        }

        return $this;
    }

    public function removeDate(TourDate $date): self
    {
        if ($this->dates->removeElement($date)) {
            // set the owning side to null (unless already changed)
            if ($date->getTour() === $this) {
                $date->setTour(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TourHighlight[]
     */
    public function getHighlights(): Collection
    {
        return $this->highlights;
    }

    public function addHighlight(TourHighlight $highlight): self
    {
        if (!$this->highlights->contains($highlight)) {
            $this->highlights[] = $highlight;
            $highlight->setTour($this);
        }

        return $this;
    }

    public function removeHighlight(TourHighlight $highlight): self
    {
        if ($this->highlights->removeElement($highlight)) {
            // set the owning side to null (unless already changed)
            if ($highlight->getTour() === $this) {
                $highlight->setTour(null);
            }
        }

        return $this;
    }

    public function getThematic(): ?Category
    {
        return $this->thematic;
    }

    public function setThematic(?Category $thematic): self
    {
        $this->thematic = $thematic;

        return $this;
    }

    public function getDuration(): ?Category
    {
        return $this->duration;
    }

    public function setDuration(?Category $duration): self
    {
        $this->duration = $duration;

        return $this;
    }
}
