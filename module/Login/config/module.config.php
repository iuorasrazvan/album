<?php

namespace Login;


use Zend\Stdlib\RequestInterface as Request;  
use Zend\Router\Http\Literal;
use Zend\Router\Http\Part;  
use Zend\Router\Http\Regex; 
use Zend\Router\Http\Scheme; 
use Zend\Router\Http\Segment;   
use Zend\Router\Http\Hostname; 
use Zend\Router\Http\Method;  

 
use Login\Controller\HelloController;
 

use Zend\Router\RoutePluginManager;


return [
  
    'router' => [
        'routes' => [
			
			
			'login-form' => [
                'type'    => Literal::class,
                'options' => [
                    // Change this to something specific to your module
                    'route'    => '/',
                    'defaults' => [
                        'controller'    => 'login',
                        'action'        => 'loginForm',
						
                    ],
                ],
                'may_terminate' => true,
				
			], 
					
	
			'location-form' => [
				'type'    => Literal::class,
				'options' => [
					// Change this to something specific to your module
					'route'    => '/location',
					'defaults' => [
						'controller'    => 'login',
						'action'        => 'locationForm',
						
					],
				],
				'may_terminate' => true,
			],
			
									
			'product-form' => [
				'type'    => Literal::class,
				'options' => [
					// Change this to something specific to your module
					'route'    => '/product',
					'defaults' => [
						'controller'    =>'product',
						'action'        => 'product',
						
					],
				],
				'may_terminate' => true,
			],
				
				
					
			
			'contact-form'=> [
				'type'=>Literal::class, 
				'options'=> [
					'route'    => '/contact',
					'defaults' => [
						'controller'    =>'login',
						'action'        => 'contactForm',
						
					],
				
				
				], 				
				'may_terminate'=>true, 
					
			   
			],
			
			'upload'=> [
				'type'=>Literal::class, 
				'options'=> [
					'route'    => '/product/upload',
					'defaults' => [
						'controller'    =>'product',
						'action'        => 'upload',
						
					],
				
				
				], 				
				'may_terminate'=>true, 
					
			   
			],
			
				
													
			
						
			
			'register-form'=>[
			
				'type'=> Literal::class, 
				'options'=> [
					'route'=>'/login/register', 
					'defaults'=>[
						'controller'=>'login', 
						'action'=>'registerForm', 
					
					
					]
				
				
				]
			
			
			],
			
			
			
			'logout-route'=>[
			
				'type'=> Literal::class, 
				'options'=> [
					'route'=>'/login/logout', 
					'defaults'=>[
						'controller'=>'login', 
						'action'=>'logoutRoute', 
					
					
					]
				
				
				]
			
			
			]
			
		], 
			
			
    ],
   
    'view_manager' => [
        'template_path_stack' => [
            'login' => __DIR__ . '/../view',
        ],
    ],
	
	
	
	
	
	
	
];
