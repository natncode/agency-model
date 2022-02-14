<?php

declare(strict_types=1);

namespace DC\ControlPanel\Event;

use DC\Model\Entity\Tour;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CleanUpTour implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityUpdatedEvent::class => ['cleanUpTour'],
        ];
    }

    public function cleanUpTour(BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();
        if (!($entity instanceof Tour)) {
            return;
        }

        foreach ($entity->getActivities() as $activity) {
            if (empty($activity->getDescription())) {
                $entity->removeActivity($activity);
            }
        }

        foreach ($entity->getHighlights() as $highlight) {
            if (empty($highlight->getDescription())) {
                $entity->removeHighlight($highlight);
            }
        }

        foreach ($entity->getFares() as $fare) {
            if (empty($fare->getLodging()) || empty($fare->getPrice())) {
                $entity->removeFare($fare);
            }
        }
    }
}
