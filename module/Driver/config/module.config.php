<?php 

use Zend\Router\Http\Segment;  


return [


	'router'=> [
	
		'routes'=>[
		
			'driver'=>[
				'type'=>'segment', 

				'options'=>[
					'route'=>'/driver[/:controller[/:action[/:id]]]',
					'defaults'=>[
						'controller'=>'driver',
						'action'=>'index', 
					
					
					],
					
					'constraints'=>[
						'controller'=>'[a-zA-Z0-9-_]+',
						'action'=>'[a-zA-Z0-9-_]+',
						'id'=>'[\d]+', 
					
					]
				
			
			
				]
			
				
			],
			
			'driver-message'=>[
				'type'=>'literal', 

				'options'=>[
					'route'=>'/driver/message',
					'defaults'=>[
						'controller'=>'login',
						'action'=>'loginMessage', 
						'entity'=>'drivers', 
					
					],
							
			
				]
		
			
			]
					
			
		]
			
				
	],  
	
	
	'view_manager'=>[
	
		'template_map'=> [
			'index/layout'=>__DIR__ . '/../view/driver/driver/index.phtml', 
		
		],
		'template_path_stack'=>[
		
			'driver'=>__DIR__ .'/../view/', 
		
		
		],
		
		
		
		'display_exceptions' => true,
        'exception_template' => 'error/index',
	
	
	]


];  