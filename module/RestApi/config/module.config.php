<?php

namespace RestApi;

return array(
    'controllers' => array(
        'invokables' => array(
            'RestApi\Controller\SampleRestful' => 'RestApi\Controller\SampleRestfulController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'restful' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/restful[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'RestApi\Controller\SampleRestful'
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
        )
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