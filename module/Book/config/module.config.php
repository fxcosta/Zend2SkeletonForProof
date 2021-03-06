<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Book;

use Book\Service\Author;

return array(
    'controllers' => array(
        'invokables' => array(
            'book' => 'Book\Controller\BookController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'book-forms' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/book/[:controller[/:action]][/:id]',
                    'defaults' => array(
                        'action' => 'index',
                    ),
                ),
            ),
            'book-actions' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/book/[:controller[/:action][/page/:page]]',
                    'defaults' => array(
                        'action' => 'index',
                        'controller' => 'book',
                        'page' => 1
                    ),
                ),
            ),
            'book' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/book',
                    'defaults' => array(
/*                        'controller' => 'blog',
                        'action'     => 'index',*/
                    ),
                ),
/*                'may_terminate' => true,
                'child_routes' => array(
                    'authors' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'action' => 'index'
                            ),
                        ),
                    ),
                ),*/
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'invokables' => array(
            'TestService' => 'Book\Service\TestService',
        ),
/*        'factories' => array(
            'Book\Service\Author' => function($service) {
                return new Author($service->get('Doctrine\ORM\EntityManager'));
            },
        ),*/
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'book/index/index' => __DIR__ . '/../view/book/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'module_layouts' => array(
        'Book' => 'layout/layout',
    ),

    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);
