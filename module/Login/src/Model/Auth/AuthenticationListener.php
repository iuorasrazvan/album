<?php

namespace Login\Model\Auth;  

use Zend\Authentication\AuthenticationService;  

class AuthenticationListener {



	public function __construct(AuthenticationService $auth) {
			$this->auth = $auth;
		}
		public function onRoute($e) {
			
			$routeMatch=$e->getRouteMatch ();
			$routeName= $routeMatch->getMatchedRouteName();  
			
			$whitelistRoutes=['login-form', 'register-form', 'logout-route'];
			
			
			if (in_array($routeName, $whitelistRoutes)) {
				return ;
			}
			
			$backUri = !empty($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '/login'; 

			if (! $this->auth->hasIdentity()) { //Unauthicated
			
			   $e->getResponse()->setStatusCode(301)->getHeaders()->addHeaders(['location' => '/login?message=need login&redirect='.$backUri]);
			   return $e->getResponse();
			}
		}
		
		
}