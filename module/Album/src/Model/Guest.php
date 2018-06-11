<?php 

namespace Album\Model;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\SharedEventManager;


	
class Guest extends Guest1 implements EventManagerAwareInterface
{
    protected $events;
	
	public function __construct ()   {
		
		
		parent::__construct (); 
	
		$this->setEventManager(new EventManager($this->sharedEvents)); 
	
		

 
	}

    public function setEventManager(EventManagerInterface $events)
    {
        $events->setIdentifiers([
            __CLASS__, 
            get_class($this),
			
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
	

    public function doIt($foo, $baz)
    {
        $params = compact('foo', 'baz');
        $this->getEventManager()->trigger(__FUNCTION__   , $this, $params);
		
    }
	
	

	
	
	

}