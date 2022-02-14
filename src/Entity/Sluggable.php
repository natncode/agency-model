<?php

declare(strict_types=1);

namespace DC\ControlPanel\Entity;

interface Sluggable
{
    public function getName(): ?string;

    public function setSlug(string $slug): self;

    public function getSlug(): ?string;
}
