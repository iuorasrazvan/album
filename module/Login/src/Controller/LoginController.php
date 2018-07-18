<?php 

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Login\Model\ContactFormObject;  
use Login\Form\ContactForm; 
use Login\Form\LoginForm;  


use Zend\InputFilter\Input; 
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface; 
use Zend\InputFilter\InputFilterAwareInterface;  

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\StringToLower;  
use Zend\Validator\StringLength;
use Zend\Filter\StringToUpper;  

use Zend\InputFilter\Factory;

use Zend\ServiceManager\FactoryInterface;

use Zend\ServiceManager\ServiceLocatorInterface;

use Login\Model\User\UserLogin;  

use Login\Model\User\UserRegister;  

use Login\Form\Location\LocationForm;  

use Login\Model\Location\LocationObject;  

use Login\Model\Contact\ContactObject;  



use Login\Form\Register\RegisterForm;  

use Login\Model\Auth\Adapter;

use Login\Model\User\UserRegisterTable;  

use Zend\Mvc\InjectApplicationEventInterface;

use Zend\Db\Adapter\AdapterInterface;  

use Zend\Authentication\Storage\Session;  


use Zend\Authentication\AuthenticationService;  

use Zend\Authentication\Storage\Session as SessionStorage;

use Zend\Session\SessionManager; 

use Zend\Session\Container;  

use Album\Controller\AlbumController; 

use Zend\Permission\Acl;  

use Login\Model\Auth\AuthService;  

 


class LoginController extends AbstractActionController  implements InjectApplicationEventInterface   {
	
	private $contactForm;  
	private $loginForm; 

	private $serviceLocator;
	
	private $userRegisterTable;  
	private $aclTable;  
	
	private $auth;  
	
	public function __construct ($contactForm, $loginForm,  $serviceLocator, $table, $aclTable, $auth)  {
		
		$this->contactForm=$contactForm;
	
		$this->loginForm=$loginForm;
		
		$this->serviceLocator=$serviceLocator;  
	
		$this->userRegisterTable=$table;  
		
		$this->aclTable = $aclTable;  
		
		$this->auth=$auth;  
		
	}
	
	
	public function contactFormAction ()  {

		$contactForm=$this->contactForm ;

		$contactObject=new ContactObject ();

        $contactForm->bind($contactObject);  		

		$request=$this->getRequest ();

		if (!$request->isPost ())  { 
			
			return array('form'=>$contactForm);  
		}

		$data=$request->getPost ();

		$contactForm->setData($data); 

		if ($contactForm->isValid ()) { 
			
			// do staff
		
		}
		
		else {
			
			return ['form'=>$contactForm];  
		}

	
		
	}
	
	public function locationFormAction ()   {
	

				
		$locationForm=(new LocationForm ())->getForm(); 
	
		
		$locationObject=new LocationObject;
		
			
		$locationForm->bind ($locationObject);  

		
		$request=$this->getRequest();
		
	    if (!$request->isPost())  { 
		
			return ['form'=>$locationForm];
			
		}
		$data=$request->getPost ();  	
		
		$locationForm->setData($data); 
		
		if ($locationForm->isValid ()) { 
		

			// do staff 
			
		}
		
		else  {

			
			return array ('form'=>$locationForm);  
			
		}
		
		
		
			
		
	}
	
			

	public function loginFormAction () {
		
			if ($this->auth->hasIdentity()) {
				
				$id_user=$this->auth->getIdentity ()->id_user;  
			
				
				$user=$this->userRegisterTable->getUser($id_user);  
			
			
				return ['user'=>$user];  
			                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                	
						
			}
			
			$userLogin=new UserLogin ();  
			
			$userLogin->username='username'; 
			
			$userLogin->password='your password'; 
				
			
			$loginForm=$this->loginForm->getForm ();   
			
			
			$loginForm->bind ($userLogin);  
			
			$message=$this->params()->fromQuery('message');  
			
			$redirect= $this->params()->fromQuery('redirect');  
					
		
			$request=$this->getRequest();  
		   
			
			if(!$request->isPost())  {
			
	 
				return array ('form'=>$loginForm, 'message'=>$message, 'redirect'=>$redirect); 
						
					
			}
				
			else {
			
				
				$data=$request->getPost ();
				
				$loginForm->setData($data);  
				
				$this->params()->fromRoute('redirect');
			
				if ($loginForm->isValid ())  {
					
					$result=$this->authenticate ($userLogin->username, $userLogin->password);  
					if (isset($result['error']))  {
						
						return ['error'=>$result['error'],'form'=>$loginForm];  
					}
					
					
									
				}
				
				else {
					return ['form'=>$loginForm, 'message'=>'neconform credentials'];  
					
					
				}
							
				
			}
				
				
		
	}	
	
	
	public function registerFormAction ()   {
		
		
		$userRegister=new UserRegister () ;
		
		$userRegister->username='Your username';
		
		$userRegister->password='Your password'; 
		
		$userRegister->name='Your name';  
		
		$registerForm=new RegisterForm (); 
		
		$registerForm->bind($userRegister);  
 		
		
		$request=$this->getRequest ();  
		
		if (!$request->isPost())  {
			
			return ['form'=>$registerForm];  
			
		}
			
		$data=$request->getPost();
		
		
			
		$registerForm->setData($data);  
		
			
		if ($registerForm->isValid()) {
			 
			
				$username_exists=$this->userRegisterTable->checkDuplicate($userRegister->username);  
				
				if ($username_exists)  {
					
					return ['form'=>$registerForm, 'message'=>'username already exists'];  
				}

				
				else   {
				
					
					$this->userRegisterTable->insertUser($userRegister);


					
					$this->authenticate($userRegister->username, $userRegister->password);
	
					
				}

			
		}
			
		else {
			
			
			return ['form'=>$registerForm];    
		}
			
			
	}
		
	
			
		
		
	
	
	
	public function authenticate ($username, $password)   {
		
	 	$authAdapter=$this->auth->getAdapter(); 
		
			
		$authAdapter->setIdentity($username);
		
		$authAdapter->setCredential($password); 
		
		
		$select = $authAdapter->getDbSelect();
		
		$random_bytes=$this->userRegisterTable->select_random_bytes($username);
		
		$select->where ([
			'password_salt'=>md5($password.$random_bytes)
		]);  
		
	

		$result = $this->auth->authenticate ();
			
		
		
		
		if (! $result->isValid()) {
			
			
		
			return ['error'=> current($result->getMessages())];     
		}
		
		
		
		
		
		$exclude=['password','password_salt','random_bytes'];  			
		
		$row = $authAdapter->getResultRowObject(null,$exclude);
		
		$this->auth->getStorage()->write($row);  //Storage user object in session.

		$url=$this->params()->fromQuery('redirect'); 
		
		if ($url) {
			 return $this->redirect()->toUrl($url);
		} else {
			 return $this->redirect()->toRoute('login-form');
		}
				
			
			
				

		
			
				
						
	}
		
		
		
		
	
	
	
	public function logoutRouteAction ()  {
		
		$session=new SessionManager();
		
		$session->destroy (); 
		
		$this->redirect()->toRoute('login-form');  
		
	    
		
	}
	
	
	public function loginMessageAction () {
		
		$entity = $this->params()->fromRoute('entity');  
		
		return ['entity'=>$entity];  
		
	}
	
	

	
	
	
	
}