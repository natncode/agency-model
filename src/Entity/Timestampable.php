<?php

declare(strict_types=1);

namespace DC\Model\Entity;

interface Timestampable
{
    public function getCreatedAt(): ?\DateTimeImmutable;

    public function getUpdatedAt(): ?\DateTimeImmutable;

    public function setCreatedAt(\DateTimeImmutable $createdAt): self;

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self;
}
