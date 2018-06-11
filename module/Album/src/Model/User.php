<?php 
    namespace Album\Model; 

		
		
	use Zend\EventManager\EventManagerInterface;
	use Zend\EventManager\EventManager;
	use Zend\EventManager\EventManagerAwareInterface;
	use Zend\EventMnager\CustomEvent; 
	use Album\Model\User1;

	use Zend\EventManager\SharedEventManager;
	


	

	class User extends User1 implements EventManagerAwareInterface  {
		

		protected $events;
		
	
		
		public function __construct () {
			parent::__construct ();
			
			$this->setEventManager(new EventManager($this->sharedEvents));
			$this->events=$this->getEventManager (); 
			
			

		}
		
		

		public function setEventManager(EventManagerInterface $events)
		{
			$events->setIdentifiers([
				__CLASS__, 
				get_class($this)
			]);
			$this->events = $events;
			
		
		}

		public function getEventManager()
		{
			if (! $this->events) {
				$this->setEventManager(new EventManager());
			}
			return $this->events;
		}
	
		
		public function someExpensiveCall ($criteria1, $criteria2 )  {
			
	
			
			$params = compact ('criteria1','criteria2');
	
			$results=$this->getEventManager()->triggerUntil(
				function ($r) {
		
					return (is_array($r));  
				},
				
				__FUNCTION__ .'pre', 
				$this, 
				$params
			);
			if ($results->stopped())  {
				
				return $results->last()[1]. 'get from cache</br>'; 
				
			}
			
			
			
			
			$results=$this->getEventManager()->trigger(
			
				
				__FUNCTION__ . 'post', 
				$this, 
				$params
			);
			
			$comp_res=$this->cache->getItem (md5(json_encode($params)));
			
	
			return $comp_res.'set to cache</br>'; 
			
		
		}
		
		
		public function userEvent ($crit1, $crit2)   {
			
			$params=compact ('crit1', 'crit2');  
		    
		   
			$this->events->trigger (__FUNCTION__ .'1',  $this, $params);  
			
			
			$this->events->trigger (__FUNCTION__ .'2',  $this, $params);  
			
		}
		
		
		
	
	

		
		
		
		
		
		
		
		
		

		
		
	

	
}

		
		
		
	
			
	