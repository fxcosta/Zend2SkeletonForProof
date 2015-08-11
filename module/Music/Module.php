<?php
namespace Music;

use Music\Form\Music;
use Music\Service\Album;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Music\Service\Album' => function($service) {
                    return new Album($service->get('Doctrine\ORM\EntityManager'));
                },
                'Music\Service\Music' => function($service) {
                    return new \Music\Service\Music($service->get('Doctrine\ORM\EntityManager'));
                },
                'Music\Form\Music' => function($service) {
                    return new Music($service->get('Doctrine\ORM\EntityManager'));
                },
            ),
        );
    }
}
