<?php 

use Zend\Router\Http\Segment;  


return [


	'router'=> [
	
		'routes'=>[
			'acl'=> [
				'type'=>Segment::class, 

				'options'=>[
				    'route'=>'/acl[/:controller[/:action[/:id]]]',
					'defaults'=>[
						'controller'=>'acl',
						'action'=>'index', 
						
					
					],
					
					'constraints'=>[
						'controller'=>'[a-zA-Z0-9-_]+',
						'action'=>'[a-zA-Z0-9-_]+',
						'id'=>'[\d]+', 
					
					]
					
				
				
				]
			
			
			
			]
		
		
		
		
		
		]
	
	
	
	],
	
	'view_manager'=>[
		'template_path_stack'=>[
			'acl'=>__DIR__ .'/../view/', 
		
		
		]
	
	
	]


];  