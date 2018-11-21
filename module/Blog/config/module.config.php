<?php

namespace Blog;

return [
    'controllers' => [
        'invokables' => [
            'Blog\Controller\Blog' => 'Blog\Controller\BlogController',
        ],
    ],
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
    'view_manager' => [
        'template_path_stack' => [
            'blog' => __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Blog/Model']
            ]],
        'connection' => [
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver'
                ],
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => [
                    'host'     => '127.0.0.1',
                    'user'     => 'root',
                    'password' => '123',
                    'dbname'   => 'zf_blog',
                ]
            ],
        ],
    ],
];