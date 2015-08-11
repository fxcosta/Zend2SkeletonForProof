<?php
namespace Book;

use Book\Controller\AuthorController as AController;
use Book\Service\Author;
use Book\Service\Book;
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
                'Book\Service\Book' => function($service) {
                    return new Book($service->get('Doctrine\ORM\EntityManager'));
                },
                'Book\Service\TestService' => function($service) {
                    return new TestService("roxo");
                },
                'Book\Form\Author' => function($service) {
                    $em = $service->get('Doctrine\ORM\EntityManager');
                    $repository = $em->getRepository('Book\Entity\Category');
                    $especialidades = $repository->fetchPairs();

                    return new \Book\Form\Author($em, $especialidades, null);
                },
                'Book\Form\Book' => function($service) {
                    $em = $service->get('Doctrine\ORM\EntityManager');
                    $repository = $em->getRepository('Book\Entity\Author');
                    $autores = $repository->fetchPairs();

                    return new \Book\Form\Book($em, $autores, null);
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
                    $controller = new AController($service);
                    return $controller;
                },
            ),
        );
    }
}
