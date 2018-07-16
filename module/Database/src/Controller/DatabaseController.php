<?php 

namespace Database\Controller;  

use Zend\Mvc\Controller\AbstractActionController;  
use Zend\Db\Adapter\Adapter;  
use Zend\Db\ResultSet\AbstractResultSet; 
use Zend\Db\Adapter\Driver\ResultInterface;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\Reflection as ReflectionHydrator;

use Zend\Db\Sql\Sql;   

use Zend\Db\Sql\Update; 
use Zend\Db\ResultSet\ResultSet; 

use Zend\Db\Sql\TableIdentifier; 
use Zend\Db\Sql\Where; 

Use Zend\Db\Sql\Predicate\Predicate; 


use Database\Model\Shoe;  

use Zend\Db\Sql\Ddl;  

use Zend\Db\TableGateway\TableGateway;  

use Zend\Db\RowGateway\RowGateway; 

use Database\Model\Table\TrucksTable;  

use Zend\Db\TableGateway\Feature\MetadataFeature;  

use Zend\Db\TableGateway\Feature\RowGatewayFeature; 

use Zend\Session\Config\StandardConfig;   

use Zend\Session\SessionManager;  
use Zend\Session\Container ; 

use Database\Model\Writer;

use Database\Model\BlogPost;  

use Zend\Permissions\Rbac\Role;  

use Zend\Permissions\Rbac\Rbac;   

use Database\Model\Article;  

use Database\Model\User;  

use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver\AggregateResolver; 
use Zend\View\Resolver\TemplateMapResolver;  
use Zend\View\Resolver\RelativeFallbackResolver;  



class DatabaseController extends AbstractActionController    {
	
	protected $table;  
	
	public function __construct ($table)  {
		
		$this->table =  $table;  
		
	
	}
	
	
	
	
	public function routeAction ()  {
		
		$hydrator = new \Zend\Hydrator\ClassMethods();

		$a = new A();
		
		$a->b=44; 


	


		$data=$hydrator->extract ($a);  
		
		print_r ($data);  
	
			
	}
	
	public function route1Action ()  {
		
		
	  
		
	}
	
	
	public function route2Action ()  {
		
		
	  
		
	}
	
	
	public function route3Action ()  {
		
		$container =new Container ('nss');  
		
		echo $container->foo; 
	}
	
	
}


class A   {
	public $a, $b;  
	
	public function setA  ($a)  {
		
		$this->a=$a;  
	}
	
	public function getA ()  {
		
		return $this->a;   
	}
	
	public function setB  ($b)  {
		
		$this->b=$b;  
	}
	
	public function getB ()  {
		
		return $this->b;   
	}
}



