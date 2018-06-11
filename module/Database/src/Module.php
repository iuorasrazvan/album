<?php 

namespace Database;  
use Zend\Db\Adapter\Adapter; 

use Zend\Mvc\ModuleRouteListener;	
use Zend\Session\SessionManager; 
use Zend\Session\Container;  

use Zend\ModuleManager\ModuleManager; 
use Zend\Router\RouteMatch;  
use Zend\Mvc\ResponseSender\SendResponseEvent;

use Zend\Config\Config ;  
use Zend\Session; 





use Zend\Session\Config\SessionConfig; 





class Module  {
	
	
	
	public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

	
	
	
	public function onBootstrap ($e)  {
		
		$app = $e -> getApplication ();
		
		$eventManager=$app ->getEventManager ();
	
		
		$moduleRouteListener =new ModuleRouteListener ();
		
		$moduleRouteListener->attach ($eventManager);

		$this -> bootstrapSession ($e);  
		
		
	
		
		
	}	
	
	public function bootstrapSession ($e)   {
		
		$serviceManager=$e->getApplication()->getServiceManager ();  
		
		$session =$serviceManager->get(SessionManager::class);
		
		
		
		$session->start();  
		
		$container = new Container('initialized');

        if (isset($container->init)) {
            return;
        }
		
		$request  = $serviceManager->get('Request');
		
		$session->regenerateId (true);  
		
		$container->init          = 1;
        $container->remoteAddr    = $request->getServer()->get('REMOTE_ADDR');
        $container->httpUserAgent = $request->getServer()->get('HTTP_USER_AGENT');
		
		$config = $serviceManager->get('config'); 
		$validators = $config['session_manager']['validators'];  
		$chain=$session->getValidatorChain ();  
		
		foreach ($validators as $validator)  {
			
			switch ($validator)  {
				
				case Session\Validator\RemoteAddr::class :
					$validator = new $validator($container->remoteAddr);
					break;

					
			
				
				case Session\Validator\HttpUserAgent::class : 
					$validator = new $validator ($container->httpUserAgent); 
					break;   
			
				
				default :
					
                    $validator = new $validator();
				
				
				
			}
			
			 $chain->attach('session.validate', array($validator, 'isValid'));
		}
		
		
		
		
		
	
    }
				
		
			
		
	
	
	
	

		
	public function getServiceConfig ()  {
		
		return [
		
			'factories' => [
			//	\Zend\Session\Config\ConfigInterface::class => \Zend\Session\Service\SessionConfigFactory::class,
				
				SessionManager::class=> function ($container, $requestedClass)  {
					
				
					$config=$container->get('config');  
					
					$session =$config['session_manager'];  
					
					if (!isset($session['config']))    {
						
						$sessionManager=new SessionManager;
						Container::setDefaultManager($session);
						
						return $sessionManager;  
					}


					if (isset($sesson['config']))  {
						
						$class= isset($session['config']['class']) ? $session['config']['class']: SessionConfig::class;  
						
						
						$options = isset($session['config']['options'])
                            ?  $session['config']['options']
                            : [];

                        $sessionConfig = new $class();
                        $sessionConfig->setOptions($options);
						
					}
					
					if (isset($session['storage']))   {
						$class =$session['storage'];
						$storage=new $class;  
						
						
					}
					
					
					
					$sessionManager= new SessionManager ($sessionConfig, $storage);  
					Container::setDefaultManager($sessionManager);
                    return  $sessionManager; 
					
				}
		
			
			
			]
		]; 
  
	}	
		
		

	
	
}