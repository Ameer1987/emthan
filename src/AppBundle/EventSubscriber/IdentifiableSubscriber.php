<?php

namespace AppBundle\EventSubscriber;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class IdentifiableSubscriber implements EventSubscriber {

    protected $tokenStorage;

    public function __construct(TokenStorage $tokenStorage) {
        $this->tokenStorage = $tokenStorage;
    }

    public function getSubscribedEvents() {
        return array(
            Events::prePersist,
            Events::preUpdate,
        );
    }

    public function PrePersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();

        $this->handleEvent($entity);
    }

    public function PreUpdate(LifecycleEventArgs $args) {
        $entity = $args->getEntity();

        $this->handleEvent($entity);
    }

    protected function handleEvent($entity) {
        if ($this->isInstanceOf($entity, array('Year', 'Term', 'Level', 'SubLevel', 'Subject', 'Category', 'Book'))) {
            $user = $this->tokenStorage->getToken()->getUser();

            $entity->setUpdatedAt(new \DateTime('now'));
            $entity->setUpdatedBy($user);

            if ($entity->getCreatedAt() == null) {
                $entity->setCreatedAt(new \DateTime('now'));
                $entity->setCreatedBy($user);
            }
        }
    }

    protected function isInstanceOf($object, Array $classnames) {
        foreach ($classnames as $classname) {
            $classname = "AppBundle\\Entity\\" . $classname;
            if ($object instanceof $classname) {
                return true;
            }
        }
        return false;
    }

}
