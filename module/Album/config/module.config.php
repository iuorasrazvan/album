<?php 

namespace Album;

use Zend\Router\Http\Segment;

use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory;


return [
   
	
	  'router' => [
        'routes' => [
		
			'album' => [
				'type'    => Segment::class,
				'options' => [
					'route' => '/album[/:action[/:id]]',
					'constraints' => [
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
						
					],
					'defaults' => [
						'controller' => 'albumController',
						'action'     => 'index',
						'message'=>'albums', 
					],
				],
					
			],
				
				
			'album-page' => [
				'type'    => Segment::class,
				'options' => [
					'route' => '/album/page[/:page]',
					'constraints' => [
						
						'id'     => '[0-9]+',
					],
					'defaults' => [
						'controller' => 'albumController',
						'action'     => 'index',
					],
				],
				
			],
			
			'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/user/:action',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
			
			
			'guest' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/guest/:action',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => 'guest',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
	
	'controller'=>[
		'factories'=> [
			Controller\AlbumTestCountroller::class=>function ($container, $requestedName) {
				
				return new $requestedName($container);  
			}
		
		]
	
	
	],  
	
	
	
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
