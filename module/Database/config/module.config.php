<?php 

namespace Database;  

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;  

use Database\Model\Table\TrucksTableQueries;  


return [



	'router'=> [
	
		'routes'=>[
		
			 
			'database-route'=>[
				 
				'type'=>Segment::class, 
				
				'options'=>[ 
					'route'=>'/database[/:action]', 
					'defaults'=>[
						'controller'=>'path', 
						
						'action'=>'route',  
						'id'=>200, 
					
					
					]
				], 
				
				'may_terminate'=>true,
				
				'child_routes'=>[
				
							
					'database-route-2'=>[
						 
						'type'=>Literal::class, 
						
						'options'=>[ 
							'route'=>'/route2', 
							'defaults'=>[
								'controller'=>Controller\DatabaseController::class, 
								
								'action'=>'route2',  
							
							
							]
						]
					]
				
				
				
				
				]
			], 
			
			
			
		
		
		]	
		
	
	], 

	'controllers'=>[
		'factories'=>[
	
			Controller\DatabaseController::class=> function ($container, $requestedName) {
				$trucksTableQueries= $container->get(TrucksTableQueries::class);  
				return new $requestedName ($trucksTableQueries); 
				
			} 
				
			

		], 
		
		'aliases'=> [
			'path'=>Controller\DatabaseController::class, 
		
		]
	
	
	
	], 
	
	
	'view_manager'=> [
	
		'template_map'=>[
			'home'=> __DIR__ . '/../view/database/database/route.phtml'
		
		], 
		
		'template_path_stack'=>[
			 'database' => __DIR__ . '/../view',
		
		
		], 
		
		
        'doctype' => 'HTML4_LOOSE',
      
   
	], 
		
		
	
	










]; 