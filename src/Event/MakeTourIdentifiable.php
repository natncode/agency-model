<?php

declare(strict_types=1);

namespace DC\Model\Event;

use DC\Model\Entity\Tour;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Uid\Uuid;

class MakeTourIdentifiable implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['makeTourIdentifiable'],
        ];
    }

    public function makeTourIdentifiable($event): void
    {
        $entity = $event->getEntityInstance();
        if (!($entity instanceof Tour)) {
            return;
        }

        $entity->setUuid(Uuid::v4());
    }
}
