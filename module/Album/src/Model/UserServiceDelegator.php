<?php 

namespace Album\Model; 

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

use Album\Model\BuzzDelegator; 
use Zend\EventManager\EventManager;

class UserServiceDelegator implements DelegatorFactoryInterface  {
	
	
	public function __invoke (ContainerInterface $container, $requestedName, $closure ,$options=null)   {
		
		$realBuzzer   = call_user_func($closure);
		
		$eventManager = new EventManager;

        $eventManager->attach('buzz', function () { echo "Stare at the art!\n"; });

        return new BuzzDelegator($realBuzzer, $eventManager);
		
		
	}
	
}