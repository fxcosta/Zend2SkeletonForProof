<?php
namespace Book;

use Book\Controller\AuthorController;
use Book\Service\Author;
use Book\Service\TestService;
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
                'Book\Service\Author' => function($service) {
                    return new Author($service->get('Doctrine\ORM\EntityManager'));
                },
                'Book\Service\TestService' => function($service) {
                    return new TestService("roxo");
                },
            ),
        );
    }

    /**
     * Configurações que contem as dependências das controllers
     * Caso a configuração seja feita aqui, para evitar conflito, remover as
     * configurações das controllers de module.config.php
     *
     * @return array
     */
    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                //Suppose one of our routes specifies
                //a controller named 'myController'
                'authors' => function ($sm) {
                    $locator = $sm->getServiceLocator();
                    $service = $locator->get('Book\Service\TestService');
                    $controller = new AuthorController($service);
                    return $controller;
                },
            ),
        );
    }
}
