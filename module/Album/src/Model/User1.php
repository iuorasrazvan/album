<?php 

	namespace Album\Model; 
		
	use Zend\EventManager\EventInterface;
	use Zend\EventManager\EventManagerInterface;
	use Zend\EventManager\ListenerAggregateInterface;
	use Zend\Cache\Storage\Adapter\Filesystem   as Cache; 
	
    use Zend\EventManager\LazyListenerAggregate;   
	
	Use Album\Model\LazyListener1; 
	
  	use Zend\EventManager\SharedEventManager;
	

	
	class User1  implements ListenerAggregateInterface {
		
		protected $listeners=[]; 
		
		protected $cache; 
		
		protected $sharedEvents; 
		
		
		
	
		public function __construct () {
			
			$this->cache=new Cache (); 
			$this->cache->getOptions()->setTtl(6);
			
			$this->sharedEvents=new SharedEventManager;  
			
		
			
		}
		
		

		public function attach (EventManagerInterface $events,$priority=1)  {
			
		   	
			
			$this->listeners[]=$events->attach('someExpensiveCallpre',  array ($this, 'Listener1'),100);
			
			$this->listeners[]=$events->attach('someExpensiveCallpost', array ($this, 'Listener2'),-100);
			
			
			
			$this->listeners[]=$events->attach('userEvent1',  array ($this, 'userListener1_1'),100);
			
			$this->listeners[]=$events->attach('userEvent1',  array ($this, 'userListener1_2'),200);
			
			$this->listeners[]=$events->attach('userEvent1',  array ($this, 'userListener1_3'),300);
			
			
			
			$this->listeners[]=$events->attach('userEvent2',  array ($this, 'userListener2_1'),100);
			
			$this->listeners[]=$events->attach('userEvent2',  array ($this, 'userListener2_2'),200);
			
			$this->listeners[]=$events->attach('userEvent2',  array ($this, 'userListener2_3'),300);
			
			
			
			$this->listeners[]=$events->attach('subUserEvent1',  array ($this, 'userListener1_1'),100);
			
			$this->listeners[]=$events->attach('subUserEvent1',  array ($this, 'userListener1_2'),200);
			
			$this->listeners[]=$events->attach('subUserEvent1',  array ($this, 'userListener1_3'),300);
			
			
			$this->listeners[]=$this->sharedEvents->attach(get_class($this),'userEvent1', array ($this, 'SharedListener'));
			
			$this->listeners[]=$this->sharedEvents->attach(get_class($this),'userEvent1', array ($this, 'SharedListener'));

		
			
		
			
			
			
				
		}
        
		
		public function detach (EventManagerInterface $events) {
			
		
				
			foreach ($this->listeners as $index => $listener) {
				$events->detach($listener);
				unset($this->listeners[$index]);
			}
				
		}
		
		
		
		
		
		public function Listener1 (EventInterface $e)   {
			
		
			$params=$e->getParams (); 
	
			
			$key=md5(json_encode ($params)); 
			$hit=$this->cache->getItem ($key); 
			
			
		
			if (!empty($hit)) { return array ($key,$hit);   } 
	        

		}
		
				
		public function Listener2 (EventInterface $e)   {
		   
		  
			$params = $e->getParams();
		//	$result = $params['__RESULT__'];
		//	unset($params['__RESULT__']);
			$key    = md5(json_encode($params));
			$this->cache->setItem ($key, json_encode($params));

		   // return $this->cache->getItem($key);  
			
	

		}

				
		public function userListener1_1 (EventInterface $e)  {


			$event  = $e->getName();
			$name=get_class($e->getTarget()); 
			
			$params= $e->getParams (); 
	
			printf('method %s: from class %s with args %s', $event ,$name, json_encode($params));
			
			echo '</br>'; 

		}
		
				
		public function userListener1_2 (EventInterface $e)  {


			$event  = $e->getName();
			$name=get_class($e->getTarget()); 
			
			$params= $e->getParams (); 
	
			printf('method %s: from class %s with args %s', $event ,$name, json_encode($params));
			
			echo '</br>'; 

		}
		
				
		public function userListener1_3 (EventInterface $e)  {


			$event  = $e->getName();
			
			$name=get_class($e->getTarget()); 
			
			$params= $e->getParams (); 
	
			printf('method %s: from class %s with args %s', $event ,$name, json_encode($params));
			
			echo '</br>'; 

		}
		
		
		
		
		
		public function userListener2_1 (EventInterface $e)  {


			$event  = $e->getName();
			$name=get_class($e->getTarget()); 
			
			$params= $e->getParams (); 
	
			printf('method %s: from class %s with args %s', $event ,$name, json_encode($params));
			
			echo '</br>'; 

		}
		
				
		public function userListener2_2 (EventInterface $e)  {


			$event  = $e->getName();
			$name=get_class($e->getTarget()); 
			
			$params= $e->getParams (); 
	
			printf('method %s: from class %s with args %s', $event ,$name, json_encode($params));
			
			echo '</br>'; 

		}
		
				
		public function userListener2_3 (EventInterface $e)  {


			$event  = $e->getName();
			
			$name=get_class($e->getTarget()); 
			
			$params= $e->getParams (); 
	
			printf('method %s: from class %s with args %s', $event ,$name, json_encode($params));
			
			echo '</br>'; 

		}
		
		
		
		
		public function SharedListener (EventInterface $e)  {

			echo 'sharedListener';
			$event  = $e->getName();
			$name=get_class($e->getTarget()); 
			
			$params= $e->getParams (); 
	
			printf('method %s: from class %s with args %s', $event ,$name, json_encode($params));
			
			echo '</br>'; 

		}
		
		
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
		
		
		
	}
		
	
