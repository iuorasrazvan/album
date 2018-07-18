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

use Zend\Navigation\Page\Mvc;  

use Zend\Permissions\Acl\Acl;  
use Login\Model\User\UserRegister;  
use Album\Model\Album;  
use Zend\Mvc\MvcEvent;  

use Login\Model\Navigation\View\MyHelper;  

use Login\Model\Auth\AuthenticationListener;   


class Module

{
	
	
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
	
	public function onBootstrap ($e)  {
		
		$app=$e->getApplication();
	
		$eventManager=$app->getEventManager ();

		$serviceManager=$app->getServiceManager ();  
		
		$auth=$serviceManager->get('auth'); 
		
		$eventManager->attach ('route', [ new AuthenticationListener($auth), 'onRoute']);  
		
		
		
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
				
				Model\User\UserRegister::class=>InvokableFactory::class,  
				
			
				
				Module::class=>InvokableFactory::class, 
				\Zend\Authentication\AuthenticationService::class=>Model\Auth\AuthServiceFactory::class, 
				
				\Model\Auth\AuthenticationListener::class=> ReflectionBasedAbstractFactory::class,
			
				
				
			],
			
		
			
			'aliases'=>[
				 'userRegister'=>Model\User\UserRegister::class, 
				 'userRegisterTable'=>Model\User\UserRegisterTable::class, 
				 'auth'=>\Zend\Authentication\AuthenticationService::class, 
			
			]
			
	
		
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
	

	
	
}
