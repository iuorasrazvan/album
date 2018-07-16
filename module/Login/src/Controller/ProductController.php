<?php 


namespace Login\Controller ;  


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Login\Form\Product\ProductForm;  
use Login\Form\Upload\UploadForm;  

use Zend\Navigation\Page\Mvc;
use Zend\Router\Http\Segment;
use Zend\Router\Http\TreeRouteStack;

use Login\Model\Product\Product;   

use Login\Model\Pages\Page1;  


class ProductController extends AbstractActionController  {
	
	public function productAction ()  {
		
		
		
		
		$productForm=new ProductForm ();  
		
		$product=new Product ();
		
		$productForm->bind($product);  
		
		
		$request=$this->getRequest ();
		
		if ($request->isPost())   {
			
			$data=$request->getPost ();  
			
			$productForm->setData($data);  
			
			if ($productForm->isValid ())  {
				
				print_R($product);  
			}
			
			else {
				
				print_r($productForm->getMessages()); 
			}
		}
		
		return array ('form'=>$productForm);  
		
		
		
	}
	
	
	public function uploadAction ()  {
		$route1=Segment::factory ([
			'route'=>'/:controller/:action',  
			'defaults'=>[
				'controller'=>'product', 
				'action'=>'upload',
			
			]
		
		
		]);  
		
		
		$router= $this->getEvent()->getRouter ();  
		
	
		$routeMatch= $router->match($this->getRequest());  
		
	
		
		$page1= new Mvc ([
		
			'label'=>'Page1', 
			'route'=>'upload', 
		
			'router'=>$router, 
			'routeMatch'=>$routeMatch, 
			
		
		]);  
		
		
		echo $page1->isActive ();  
		
		
		echo $page1->getHref ();  
		
		
		
		
		return ['page1'=>$page1];  
		

	
	
	
    }

}