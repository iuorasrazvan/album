<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
 
 
use Album\Model\Album;  


use Album\Model\UserService1;
use Album\Model\UserService2;
use Album\Model\UserService3;
use Album\Model\UserService4;  
use Zend\Session;   
use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory;

use Zend\Navigation\Navigation;   

use Zend\Navigation\Page\AbstractPage;  
use Zend\Router\Http\TreeRouteStack;  
 



  return  [
	
	'db' => [
        'driver' => 'Pdo',
        'dsn'    =>'mysql:dbname=zftutorial;host=127.0.0.1',
		'user'=>'root',
		'pass'=>''
    ],
	
	 ConfigAbstractFactory::class => [
        UserService3::class => [
			UserService1::class,
			UserService2::class,
			
		
		
		],
		
		UserService4::class=>[]
		
		
 
            
    ],
	'session_config'=>[
		'cookie_http_only'=>true, 
	],  
	
	'session_storage'=>[
		'type'=>\Zend\Session\Storage\SessionArrayStorage::class
	], 
	
	
	 'session_manager' => [
		 'config' => [
			'class' => Session\Config\SessionConfig::class,
			'options' => [
				'name' => 'database',
				'phpSaveHandler'=>'files', 
				'savePath'=>'C:/xampp/htdocs/zft/data/session', 
			],
		],
		'storage' => Session\Storage\SessionArrayStorage::class,
		'validators' => [
			Session\Validator\RemoteAddr::class,
			Session\Validator\HttpUserAgent::class,
		],
	],

	
	'view'=>[
		'base_title'=>'La porumb', 
	
	], 
	
	'navigation'=> [
		'nav1'=>[
		
			[
				'label'=>'Login form', 
				'route'=>'login-form', 
				'visible'=>true, 
				
				'rel'=>[
					'start'=>[
						'label'=>'PNL', 
						'uri'=>'http://www.pnl.ro',    
					
					],
					'next'=>[
						'label'=>'Bogata',
						'ur'=>'http://www.bogata.ro'
					
					], 
					
					'prev'=>[
						'bales'=>'CHetani', 
						'url'=>'http://www.chetani.ro', 
					
					]
				
				], 
			
			
				'pages'=>[
					[
						'label'=>'Location',
						'route'=>'location-form',  
						
						'pages'=>[
							[
								'label'=>'Product', 
								'route'=>'product-form',
								
				
										
							],
							
							[
								'label'=>'Contact', 
								'route'=>'contact-form', 
								'order'=>-10, 
								
										
									
							],
									
						
						
						],
						
					],
					
					[
						
						'label'=>'Register',
						'route'=>'register-form',  
						'pages'=>[
							[
								'label'=>'Product', 
								'route'=>'product-form',
								
				
										
							],
							
							[
								'label'=>'Contact', 
								'route'=>'contact-form', 
							
										
									
							],
									
						
						
						]
					
					
					
					]
				
				
					
				
				
				
				]
			
			
			],
	
		
		], 
		
		'nav2'=> [
			[
				'label'=>'Register form',
				'route'=>'register-form', 
				
				'pages'=>[
					[
						'label'=>'Product form', 
						'route'=>'product-form', 
					
					
					], 
					
					'pages'=> [
						'label'=>'Location form', 
						'route'=>'location-form', 
					
					]
				
				]
			
			
			]
		
		
		
		
		]
	
	], 
	
	


	
	
]; 




	 

	 
	
