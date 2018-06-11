<?php 

	function session_start_function ()  {
		session_start();  
		
		if (isset($_SESSION['destroyed']) && $_SESSION['destroyed']<time ()-300)  {
			
			session_destroy ();
			
			session_start ();   
		}
		
		
	}
	
	
	
	function create_new_session_id_function () {
		
		$new_sess_id = session_create_id (); 
		
		$_SESSION['destroyed']= time ();  
		
		session_commit ();
		
		session_id ($new_sess_id);  
		
		ini_set('session.use_strict_mode', 0);
		
		session_start ();  
		
		
	}
	
	
	session_start_function ();
	
	ini_set('session.use_strict_mode',1);  
	
	create_new_session_id_function ();  
	
	
		
