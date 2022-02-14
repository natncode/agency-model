<?php

declare(strict_types=1);

namespace DC\ControlPanel\Event;

use DC\ControlPanel\Common\Slugger;
use DC\Model\Entity\Sluggable;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UpdateSlugForSluggables implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['updateSlugForSluggables'],
            BeforeEntityUpdatedEvent::class => ['updateSlugForSluggables'],
        ];
    }

    public function updateSlugForSluggables($event): void
    {
        $entity = $event->getEntityInstance();
        if (!($entity instanceof Sluggable)) {
            return;
        }

        $entity->setSlug(Slugger::slugify($entity->getName()));
    }
}
