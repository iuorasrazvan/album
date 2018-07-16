<?php  

namespace Login\Controller;  

use Zend\ServiceManager\Factory\FactoryInterface;  
use Login\Form\Contact\ContactForm;  
use Login\Form\Login\LoginForm;  
use Login\Model\User\UserRegisterTable;  



class LoginControllerFactory implements FactoryInterface  {
	
	
	public function __invoke ($container, $requestedName, array $options=null)   {
		
		
		$contactForm=$container->get(ContactForm::class);  

		$loginForm=$container->get(LoginForm::class);  
		
		$userRegisterTable=$container->get(UserRegisterTable::class); 
		
		$aclTable=$container->get('aclTable'); 
	
		
		
		return new $requestedName($contactForm, $loginForm, $container, $userRegisterTable, $aclTable );
		
	}
	
	
}