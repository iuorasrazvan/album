<?php 

namespace Database\Controller;  
/**  database **/  

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


use Zend\Db\Sql\Ddl;  

use Zend\Db\TableGateway\TableGateway;  

use Zend\Db\RowGateway\RowGateway; 

use Database\Model\Table\TrucksTable;  

use Zend\Db\TableGateway\Feature\MetadataFeature;  

use Zend\Db\TableGateway\Feature\RowGatewayFeature; 

/** database end **/  


use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver\AggregateResolver; 
use Zend\View\Resolver\TemplateMapResolver;  
use Zend\View\Resolver\RelativeFallbackResolver;  

/** hydrators **/ 

use Zend\Hydrator;  
use Zend\Hydrator\Filter\MethodMatchFilter; 
use Zend\Hydrator\Filter\FilterComposite;  
use Zend\Hydrator\Filter;   
use Zend\Hydrator\Aggregate\AggregateHydrator;  
 

use Zend\Hydrator\Aggregate\ExtractEvent;

use Zend\Hydrator\NamingStrategy\CompositeNamingStrategy ;  

use Zend\Hydrator\NamingStrategy\MapNamingStrategy;  

use Zend\Hydrator\NamingStrategy\UnderscoreNamingStrategy; 

use Zend\Hydrator\AbstarctHydrator;    

use Zend\Hydrator\Filter\FilterProviderInterface;  

use Zend\Hydrator\NamingStrategy\IdentityNamingStrategy;  


use Zend\Cache\Storage\Adapter\Memory;


/** hydrators end **/  


/** model **/ 

use Database\Model\User;  
use Database\Model\BlogPost; 
use Database\Model\Hydrators\UserHydrator;  
use Database\Model\Hydrators\AgeHydrator;  
use Database\Model\Hydrators\WeightHydrator;

/** model end **/ 

 


class DatabaseController extends AbstractActionController    {
	
	protected $table;  
	
	public function __construct ($table)  {
		
		$this->table =  $table;  
		
	
	}
	
	
	public function routeAction ()  {
		
	
	
		$hydrator =new Hydrator\Reflection ();  
		
		$map = new MapNamingStrategy ([
			'genre'=>'type', 
			'kilos'=>'weight',   
			
			
		
		]);
		
		$underscore=new UnderscoreNamingStrategy ();  
		
		$composite = new CompositeNamingStrategy ([
			'type'=>$map,
			'weight'=>$map,
			'genre'=>$map, 
			'kilos'=>$map, 
			'firstName'=>$underscore, 
			'first_name'=>$underscore, 
		
		]);  
		
		$hydrator->setNamingStrategy ($composite);
		
		$data=['genre'=>'horse', 'kilos'=>44, 'first_name'=>'karina'];  
	
		
		$animal =new Animal ();  
		
		
		$hydrator ->hydrate ($data, $animal);  
		print_r ($animal);  
	
		
		$data= $hydrator ->extract ( $animal);  
		
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

class Animal  
{
    public $type='pork';
	

	public $firstName='gogo';  
	
	public $weight;  
	

  
	
	
	
	public function getType () {
		
		if (!empty( $this->type))  {
			return $this->type;  
		}  
		
		return false;  
	}
	public function hasType ($a) {
		
		if (!empty ($this->type)) {
			return true;
		}
		
		return false;  
	}
	
	public function isType () {
		
		if (!empty ($this->type))  {
			return true;
		}
		
		return false;  
	}
	
		
	
		
	public function getWeight () {
		
		return 33;   
	
	
	}
	
	public function mesajPsd () {
		
		return  'muie psd';  
	}
	
	public function showPedigree ()  {
		
		return $this->pedigree;  
	}
		
		
	
	
	
}


Class Artist   { 

	 public $pisi;

	 public $cutu;  

	 public $foo='foo';  

     public function getFoo()
     {
         return $this->foo;  
     }
	 
	 public function setFoo ($foo) {
		 
		 $this->foo= $foo;  
	 }

	 public function getCutu ()  {
		 
		 return $this->cutu;
	 }
	 
	 public function getPisi ()  {
		 
		 return $this->pisi;  
	 }
	 
	 public function setCutu($cutu)  {
		 
		 $this->cutu=$cutu;  
	 }
	 
	 public function setPisi ($pisi)  {
		 
		 $this->pisi=$pisi;  
	 }
    

     public function getServiceManager()
     {
         return 'servicemanager';
     }

     public function getEventManager()
     {
         return 'eventmanager';
     }

     public function getFilter()
     {
         $compositeE = new FilterComposite();
		 
		 
         $compositeE->addFilter (
		 
			'f1', new MethodMatchFilter ('getServiceManager') , FilterComposite::CONDITION_AND  
		 
		 
		 
		 );  
		 
		  
         $compositeE->addFilter (
		 
			'f2', new MethodMatchFilter ('getEventManager') , FilterComposite::CONDITION_AND  
		 
		 
		 
		 );  

         return $compositeE;
     }
}


