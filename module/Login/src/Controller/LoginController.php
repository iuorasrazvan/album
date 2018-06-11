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

use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter; 

use Zend\Authentication\AuthenticationService;  

use Zend\Authentication\Storage\Session as SessionStorage;

use Zend\Session\SessionManager; 
use Zend\Session\Container;  

use Album\Controller\AlbumController; 

 


class LoginController extends AbstractActionController  implements InjectApplicationEventInterface   {
	
	private $contactForm;  
	private $loginForm; 

	private $serviceLocator;
	
	private $userRegisterTable;  
	
	public function __construct ($contactForm, $loginForm,  $serviceLocator, $table)  {
		
		$this->contactForm=$contactForm;
	
		$this->loginForm=$loginForm;
		
		$this->serviceLocator=$serviceLocator;  
	
		
		$this->userRegisterTable=$table;  
		
		 
		
	}
	
	
	public function contactFormAction ()  {

		$contactForm=$this->contactForm ;

		$contactObject=new ContactObject ();

        $contactForm->bind($contactObject);  		

		$request=$this->getRequest ();

		if ($request->isPost ())  { 

			$data=$request->getPost ();

			$contactForm->setData($data); 

			if ($contactForm->isValid ()) { 

			echo "data is valid </br>";

		
			print_R($contactObject);  



			}

			else  {
				echo "data is invalid </br>";

				$contactForm->getMessages ();


			}
		}



		return array('form'=>$contactForm);  

		
				
		
	
		
	}
	
	public function locationFormAction ()   {
	
		
				
		$locationForm=(new LocationForm ())->getForm(); 
	
		
		$locationObject=new LocationObject;
		
			
		$locationForm->bind ($locationObject);  

		
		$request=$this->getRequest();
		
	    if (isset($_GET) && !empty($_GET))  { 
		
		 
		
			$data=$_GET;
			
			$locationForm->setData($data); 
			
			if ($locationForm->isValid ()) { 
			
		
				print_R($locationObject);  
		
				return array ('form'=>$locationForm);  
				
			}
			
			else  {
				echo "data is invalid </br>";
				
				$locationForm->getMessages ();
				
				return array ('form'=>$locationForm);  
			}
			
		}
		
		else  {
			
			
			return array('form'=>$locationForm);  
		}
			
			
		
	}
	
			

	public function loginFormAction () {
		
			$container=new Container('login');
			
			if (isset ($container->userLogin))  {
				
				return (['user'=>$container->userLogin->name]) ; 
			
			
				
			}
			
			else { 
		
			
				$userLogin=new UserLogin ();  
				
				$userLogin->username='username'; 
				
				$userLogin->password='your password'; 
			
				
				
				$loginForm=$this->loginForm->getForm ();   
				
				
				$loginForm->bind ($userLogin);  
			
				$request=$this->getRequest();  
			   
				
				if($request->isPost())  {
				
				
					$data=$request->getPost ();
					
					$loginForm->setData($data);  
				
					if ($loginForm->isValid ())  {
						$this->authenticate ($userLogin->username, $userLogin->password);  
										
					}
					
					else {
						
						echo 'bad credentials';  
						
						$messages=$loginForm->getMessages(); 
						
						
					}
						
					
				}
				
				
				return array ('form'=>$loginForm);  
				
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
		
		if ($request->isPost())  {
			
			$data=$request->getPost();
			
			$registerForm->setData($data);  
			
			if ($registerForm->isValid()) {
				
				    $username_exists=$this->userRegisterTable->checkDuplicate($userRegister->username);  
					
					if ($username_exists)  {
						
						echo $userRegister->username. ' already exists';  
					}

					
					else   {
						
						$userData['id_user']='';  
											
						$userData['username']=$userRegister->username;  
						
						$userData['random_bytes']=random_bytes(32);
						
						$userData['password_salt']=md5($userRegister->password.$userData['random_bytes']);
					
						$userData['password']= password_hash ($userRegister->password, PASSWORD_DEFAULT);  
							
						
						$userData['name']=$userRegister->name;  
						
						
						$this->userRegisterTable->insert($userData);
						
						$this->authenticate($userRegister->username, $userRegister->password);
					
						
						
					}
		
					

				
			}
			
			else {
				
				//print_r ($registerForm->getMessages ());  
			}
		}
		
		return ['form'=>$registerForm];  
			
		
		
	}
	
	
	public function authenticate ($username, $password)   {
		
		$callback = function ($hash, $password)  {
						return password_verify($password, $hash);  
					}; 
				
			 
		$dbAdapter=$this->serviceLocator->get(AdapterInterface::class);  
			
			
		$dbAuthAdapter =  new CallbackCheckAdapter  (
			
			$dbAdapter, 
			'users', 
			'username',
			'password',
			 $callback
			
		

		);
			
		$dbAuthAdapter->setIdentity($username);
		
		$dbAuthAdapter->setCredential($password); 
		
		$select = $dbAuthAdapter->getDbSelect();
		
		$random_bytes=$this->userRegisterTable->select_random_bytes($username);
		
		$select->where ([
			'password_salt'=>md5($password.$random_bytes)
		]);  
		

		
		$authService=new AuthenticationService ;   
		
		$storage= new SessionStorage ('login');  

		$authService->setStorage($storage);

		$result = $authService->authenticate ($dbAuthAdapter);
			
			
		
		
		
		if (! $result->isValid()) {
			echo 'invalid credentials'; 
		}
		
		else {
			$exclude=['password','password_salt','random_bytes'];  
			
			
			
			$result = $dbAuthAdapter->getResultRowObject(null,$exclude);
			
			$container =new Container('login');
		
			$container->userLogin=$result;  
		
			$this->redirect()->toRoute('album');  
			
			
				

		}
			
				
						
	}
		
		
		
		
	
	
	
	public function logoutRouteAction ()  {
		
		$session=new SessionManager();
		
		$session->destroy (); 
		
		$this->redirect()->toRoute('login-form');  
		
	    
		
	}
	
	

	
	
	
	
}