<?php 


namespace Login\Controller ;  


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Login\Form\Product\ProductForm;  
use Login\Form\Upload\UploadForm;  

use Login\Model\Product\Product;   

class ProductController extends AbstractActionController  {
	
	public function indexAction ()  {
		
		
		
		
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
		
		$uploadForm=new UploadForm ('upload');  
		
		$request=$this->getRequest ();  
		
		if ($request->isPost())  {
		
            $post=array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());  
			
			$uploadForm->setData($post);  
			
			if ($uploadForm->isValid()) {
				
				print_R($data = $uploadForm->getData() );

				// Form is valid, save the form!
				//return $this->redirect()->toRoute('product-form');
			}
			
		}

		
		
		return array ('form'=>$uploadForm);   
	  
	
	
	
	
    }

}