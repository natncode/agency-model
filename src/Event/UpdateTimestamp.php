<?php

declare(strict_types=1);

namespace DC\ControlPanel\Event;

use DateTimeImmutable;
use DC\Model\Entity\Timestampable;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UpdateTimestamp implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setUpdatedAt'],
        ];
    }

    public function setCreatedAt(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();
        if (!($entity instanceof Timestampable)) {
            return;
        }

        $entity->setCreatedAt(new DateTimeImmutable());
        $entity->setUpdatedAt(new DateTimeImmutable());
    }

    public function setUpdatedAt(BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();
        if (!($entity instanceof Timestampable)) {
            return;
        }

        $entity->setUpdatedAt(new DateTimeImmutable());
    }
}
