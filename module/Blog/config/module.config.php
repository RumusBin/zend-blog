<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Blog\Controller\Blog' => 'Blog\Controller\BlogController',
        ),
    ),
    'router' => [
        'routes' => [
            'blog' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/blog[/:action][/:id]',
                     'constraints' => [
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ],
                    'defaults' => [
                        'controller' => 'Blog\Controller\Blog',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);