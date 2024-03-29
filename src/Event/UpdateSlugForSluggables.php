<?php

declare(strict_types=1);

namespace DC\Model\Event;

use DC\ControlPanel\Common\Slugger;
use DC\Model\Entity\Sluggable;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use DC\Model\Entity\Tour;

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

        if ($entity instanceof Tour) {
            $entity->setSlug(Slugger::slugify(
                sprintf('%s %s', $entity->getThematic()->getName(), $entity->getName())
            ));
            
            return;
        }

        $entity->setSlug(Slugger::slugify($entity->getName()));
    }
}
