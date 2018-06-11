<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Login;

use Zend\EventManager\EventInterface as Event;
use Zend\ModuleManager\ModuleManager;
use Zend\EventManager\EventManager;  
use Zend\ServiceManager\Factory\InvokableFactory;  
use Login\Form\Login\LoginForm;  
use Login\Form\Contact\ContactForm; 
use Zend\Db\Adapter\AdapterInterface;  

use Zend\Db\TableGateway\TableGateway;  

use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;

use Zend\Session\Container;  





class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
	
	public function onBoostrap ($e)  {
		
		$app=$e->getApplication();
		$eventManager=$app->getEventManager ();  
			
	    $eventManager->attach('dispatch', array($this, 'onDispatch'));  
		
	}
	
	public function init (ModuleManager $moduleManager)  {
		
		$eventManager=$moduleManager->getEventManager ();  
		
		$eventManager->attach('loadModules.post', array($this, 'onLoadModulesPost'));
	}
	
	public function onLoadModulesPost ($e)  {
		
		$moduleManager= $e->getTarget (); 
         
		$container = new Container ('login');
		
				
		if (isset ($container->foo))  {
		
			$album=$moduleManager->getModule('Album');  
			
			
		
		
			
		}
        		
		
		
	}
	

	
	public function getServiceConfig ()   {
		
		return [
		
		
			'factories'=>[
				ContactForm::class=>InvokableFactory::class, 
				LoginForm::class=>InvokableFactory::class, 	
				

				Model\User\UserRegisterTable::class=>function ($container, $requestedName)  {
				
					$tableGateway = $container->get(Model\User\TableGateway::class);  
					return new $requestedName($tableGateway);  
					
				}, 
				
				Model\User\TableGateway::class=>function ($container)  {
					
					
					$dbAdapter = $container->get(AdapterInterface::class);
					$resultSetPrototype=new ResultSet (); 
                    $resultSetPrototype->setArrayObjectPrototype(new  Model\User\UserRegister()); 
	                
                   
                    return new TableGateway('users', $dbAdapter, null, $resultSetPrototype);
					
				}, 
				
				'Zend\Session\Config\ConfigInterface' => 'Zend\Session\Service\SessionConfigFactory',
				
				self::class=>InvokableFactory::class, 
				
			],
			
	
		
		]; 
		
	}
	
	public function getControllerConfig ()  {
		return [
		
			'factories'=>[
					
				Controller\LoginController::class =>Controller\LoginControllerFactory::class, 
				Controller\ProductController::class =>InvokableFactory::class, 
				
					
	
				
			],
			
			'aliases'=>[
				 'login'=>Controller\LoginController::class,
				 'product'=>Controller\ProductController::class, 
				
			]
		];  
		
		
	}
	
	
	public function onDispatch ($e)  {
		echo $e->getTarget();  
		
	}
	
	
}
