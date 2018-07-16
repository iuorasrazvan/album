	if (isset($userLogin) && !empty ($userLogin))  {
		    
			$router->addRoutes([
			
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
						],
					],
					
				],
				
				
				'album-page' => [
					'type'    => Segment::class,
					'options' => [
						'route' => '/album[/page[/:page]]',
						'constraints' => [
							
							'id'     => '[0-9]+',
						],
						'defaults' => [
							'controller' => 'albumController',
							'action'     => 'index',
						],
					],
					
				],
				
				
				
			]); 
		}
		
		else {
			
			
			
			$router->addRoutes ([
			
				'album' => [
					'type'    => 'literal',
					'options' => [
						'route' => '/album',
						
						'defaults' => [
							'controller' => 'login',
							'action'     => 'loginMessage',
							'entity'=>'albums', 
						],
					],
					
				],
			]); 
			
			
			
		
		}