<?php 

namespace Album\Model;


use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\SharedEventManagerInterface;
use Zend\EventManager\SharedEventManager;



class Guest1  implements ListenerAggregateInterface  {
	
	protected $sharedEvents; 
	
	public function __construct () {
		
		$this->sharedEvents=new SharedEventManager (); 
	}
	
	public function attach(EventManagerInterface $events, $priority=1)
    {
		
        $this->listeners[] = $events->attach('doIt', [$this, 'Listener1']);
        $this->listeners[] = $events->attach('doIt', [$this, 'Listener2']);
		$this->listeners[]=$this->sharedEvents->attach (get_class($this), 'doIt', [$this,'sharedL1'] );
		$this->listeners[]=$this->sharedEvents->attach (get_class($this), 'doIt', [$this,'sharedL2'] );
		
    }

    public function detach(EventManagerInterface  $events)   
    {
        foreach ($this->listeners as $index => $listener) {
            $events->detach($listener);
            unset($this->listeners[$index]);
        }
    }

    public function Listener1 (EventInterface $e)
    {
        $event  = $e->getName();
        $params = $e->getParams();
		$target = get_class( $e->getTarget ()); 
        echo 'Listener1';
		printf(
			'Handled event "%s" on target "%s", with parameters %s',
			$event,
			$target,
			json_encode($params)
    );
		echo '</br>'; 
    }
	
	public function Listener2 (EventInterface $e)
    {
        $event  = $e->getName();
        $params = $e->getParams();
		$target = get_class( $e->getTarget ()); 
        echo 'Listener2';
		printf(
			'Handled event "%s" on target "%s", with parameters %s',
			$event,
			$target,
			json_encode($params)
		);
		echo '</br>'; 
    }
	
    public function sharedL1 (EventInterface $e)
    {
        $event  = $e->getName();
		$target= $e->getName (); 
        $params = $e->getParams();
        echo 'SharedGuest1';
		printf(
			'Handled event "%s" on target "%s", with parameters %s',
			$event,
			$target,
			json_encode($params)
    );
		echo '</br>'; 
    }
	
    public function sharedL2 (EventInterface $e)
    {
        $event  = $e->getName();
		$target=$e->getName (); 
        $params = $e->getParams();
        echo 'SharedGuest2';
		printf(
			'Handled event "%s" on target "%s", with parameters %s',
			$event,
			$target,
			json_encode($params)
    );
		echo '</br>'; 
    }
	
	
	
	
}