<?php 

namespace Database;  

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;  

return [



	'router'=> [
	
		'routes'=>[
		
			 
			'database-route-1'=>[
				 
				'type'=>Literal::class, 
				
				'options'=>[ 
					'route'=>'/database/route1', 
					'defaults'=>[
						'controller'=>Controller\DatabaseController::class, 
						
						'action'=>'route1',  
						'id'=>200, 
					
					
					]
				]
			], 
			
			'database-route-2'=>[
				 
				'type'=>Literal::class, 
				
				'options'=>[ 
					'route'=>'/database/route2', 
					'defaults'=>[
						'controller'=>Controller\DatabaseController::class, 
						
						'action'=>'route2',  
					
					
					]
				]
			], 
			
			'database-route-3'=>[
				 
				'type'=>Literal::class, 
				
				'options'=>[ 
					'route'=>'/database/route3', 
					'defaults'=>[
						'controller'=>Controller\DatabaseController::class, 
						
						'action'=>'route3',  
					
					
					]
				]
			]
		
		
		]	
		
	
	], 

	'controllers'=>[
		'factories'=>[
	
			Controller\DatabaseController::class=> InvokableFactory::class, 
				
			

		], 
	
	
	
	], 
	
	
	'view_manager'=> [
		'template_path_stack'=>[
			 'database' => __DIR__ . '/../view',
		
		
		], 
	
	
	]










]; 