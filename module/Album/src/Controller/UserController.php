<?php 


	namespace Album\Controller; 

	use Zend\Mvc\Controller\AbstractActionController;
	use Zend\View\Model\ViewModel;
	use Album\Model\User; 
	use Album\Model\User1; 
   
	use Zend\EventManager\EventManager;
	
	
	use Zend\EventManager\EventInterface;
	use Zend\EventManager\SharedEventManager;
	
	use Zend\ServiceManager\ServiceManager;
	
	
	use Album\Model\UserService1;  
	
	use Album\Model\UserService2;  

	use Album\Model\UserFactory;  
	
	use Album\Model\UserDelegatorFactory;  
	
	use Zend\ServiceManager\Factory\InvokableFactory;
	
	use Zend\ServiceManager\Proxy\LazyServiceFactory;


	use Album\Model\PluginManager;
	

	
	use Album\Model\UserServiceA;
	
	use Album\Model\StringLengthValidator; 
	
	use Album\Model\ValidatorPluginManager; 
	
	use Album\Model\UserAbstractFactory;   
	
	use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory; 
	
	use Zend\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;
	
	use Zend\EventManager\LazyListener;
	
	use Zend\EventManager\LazyEventListener; 
	
	use Album\Model\LazyListener1; 

	use Album\Model\SubUser;  
	
	use Album\Model\ObservedTarget; 
	
	use Zend\EventManager\FilterIterator;  
	
	use Zend\EventManager\FilterChain;  


	
	
	class UserController extends AbstractActionController {
		
		
		
		public function indexAction ()  {
			
			$sm=$this->getEventManager ();  
			
		
			$serviceManager=new ServiceManager ([
				'factories'=>[
					LazyListener1::class=>LazyListener1::class, 
				
				]
			
			
			]); 
			
		
			
			
			$user=new User (); 
		    
		    $eventManager=$user->getEventManager ();    
			
			$user->attach ($eventManager);
			
			
			
			
			$subUser=new SubUser  ();
			
			$eventManager=$subUser->getEventManager();
			
			$subUser->attach($eventManager);  
			
			$subUser->userEvent('crt1','crt2'); 
			
			$subUser->subUserEvent('critt1','critt2'); 
			
			$observed=new ObservedTarget;  
	
			
			/*
			
		    $res=$user->someExpensiveCall ('criteria1','criteria2'); 
				
			if (is_array($res)) {
	   			echo 'loading from cache';
				print_r($res[1]); 
			}
			
			else echo $res; 
			
			*/ 
			
			

			$f1=function ($context, array $args,  $chain) {
			    
				$args['message'] = isset($args['message'])
					? strtoupper($args['message'])
					: '';

				return $chain->next($context, $args, $chain);
			};

			$f2=function ($context, array $args,  $chain) {
			
				$args['message']= (isset($args['message'])
					? str_rot13($args['message'])
					: '');
				 return $chain->next($context, $args, $chain); 
			};

			$f3 = function ($context, array $args, $chain) {
				return (isset($args['message'])
					? strtolower  ($args['message'])
					: '');
			};
			
		    $obsTar=new ObservedTarget; 
			
			$obsTar->attachFilter('execute',$f1); 
			$obsTar->attachFilter('execute',$f2); 
			$obsTar->attachFilter('execute',$f3); 
			
			$message='Bibi'; 
			
			
			echo $obsTar->execute($message);  
	
	
						
			
		
			

			
		
	
			
		}
		
				
		public function onAction1 ($e)   {
			  
				$name=$e->getName();
				$target=get_class($e->getTarget ());

				$params=json_encode ($e->getParams()); 
					
				
				printf ("Callend  method %s, of class %s with params %s", $name, $target, $params);
			
				echo '</br>'; 
		}
		
				
		public function listener3 ($e)   {
			    echo __FUNCTION__ ; 
			
				$name=$e->getName();
				$target=get_class($e->getTarget ());

				$params=json_encode ($e->getParams()); 
					
				
				printf ("Callend  method %s, of class %s with params %s", $name, $target, $params);
				
				echo '</br>'; 
			
			
		}
		
		
		
		
		public function ListenerEvent (EventInterface $e)  {
			
			$event  = $e->getName();
			$name=get_class($e->getTarget()); 
			
			$params= $e->getParams ();
			
			printf('method %s: from class %s with args %s', $event ,$name, json_encode($params));
			
			echo '</br>'; 
			
			
			
		}
		
	
	

	}
	

	
	

		
	
	
