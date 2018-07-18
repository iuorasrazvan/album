<?php 

namespace Album\Controller; 

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\AlbumTable;

use Album\Form\AlbumForm;
use Album\Model\Album;
use Album\Filter\AlbumFilter;

use Zend\Session\Container;  

use Zend\Permissions\Acl\Acl;  
 
use Login\Model\User\UserRegister;  

use Zend\Permissions\Acl\Resource\GenericResource as Resource  ; 


use Zend\Permissions\Acl\Assertion\OwnershipAssertion;

use Zend\Permissions\Acl\Assertion\ExpressionAssertion;

use Album\Model\Paginator\AlbumDbSelect;  

use Zend\Db\Sql\Select;  

use Zend\Paginator\Paginator;  

use Zend\Paginator\Adapter\DbSelect;

use Zend\Cache\StorageFactory;






class AlbumController extends AbstractActionController   {
	
	private $table, $album, $userRegister, $aclTable, $userRegisterTable , $container, $filter;
	

	
    public function __construct(AlbumTable $table,  UserRegister $userRegister, $aclTable, $userRegisterTable, $container )
    {
        $this->table = $table;
		
		
		$this->userRegister=$userRegister;
		
		$this->aclTable=$aclTable; 
		
		$this->userRegisterTable = $userRegisterTable;  
		
		$this->container=$container;  
		
		$this->filter=new AlbumFilter (); 
		
	}
	
    public function indexAction()   {
		
		
		$acl=$this->aclTable->getAcl ();
		
		$auth=$this->container->get('auth');  
		
		if ($auth->hasIdentity () )  {
			
			$id= $auth->getIdentity()->id_user;
		
			$user=$this->userRegisterTable->getUser($id);  
		
			$paginator = $this->table->fetchAll(true);  
		
			$page = $this->params()->fromRoute('page');
		
			$page=$page<0 ? 1 :$page;  
		
			$paginator->setCurrentPageNUmber ($page); 
		
			$paginator ->setItemCountPerPage(2);   
		
		
			
			return new ViewModel([
				'albums' => $paginator,
				'user'=>$user, 

				'acl'=>$acl, 
				
			//	'paginator'=>$paginator, 
				
			]);
		}
		
		
    }

    public function addAction() { 
	

	
		$form=new AlbumForm ();  
		
		$form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }
		


		$album = new Album();
		
	   
		
		$form->bind ($album);  
		
		$form->setInputFilter($this->filter->getInputFilter()); 
     
        $form->setData($request->getPost());
		

        if (! $form->isValid()) {
            return ['form' => $form];
        }
		
		$id_user =(new Container ('login'))->userLogin->id_user;
		
		$user= $this->userRegisterTable->getUser($id_user); 	
		
	    $album->user=$user; 
		
		
        $this->table->saveAlbum($album); 
		 
	
		
	 	$acl=$this->aclTable->getAcl (); 
		

		
		$acl->allow ( 'guest', 'album', 'delete', new OwnershipAssertion());  
		
		$this->aclTable->updateAcl ($acl); 
				
		 
				
		
	
	
		
        return $this->redirect()->toRoute('album');
		
	
      
    }

    

    public function editAction()
    {
		
		$id= (int) $this->params()->fromRoute('id',0);
		
		try {
            $album = $this->table->getAlbum($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('album', ['action' => 'index']);
        }
		

		
		$form=new AlbumForm;	
		$form->bind($album); 
		$form->get('submit')->setAttribute('value', 'Edit');
		
		$request=$this->getRequest ();
		$viewData = ['id' => $id, 'form' => $form];
	
		
		if (!$request->isPost())  {
			
			return $viewData;  
		} 
		
	    $form->setInputFilter($this->filter->getInputFilter());
		
		
        $form->setData($request->getPost());
	     
		if (! $form->isValid()) {
            return $viewData;
        }
      
		
	
        $this->table->saveAlbum($album);

        // Redirect to album list
        return $this->redirect()->toRoute('album', ['action' => 'index']);
     
		
		
    }

    public function deleteAction()
    {
		
		$id = (int) $this->params()->fromRoute('id', 0);
		
        if (!$id) {
            return $this->redirect()->toRoute('album');
        }

        $request = $this->getRequest();
		
	
        if ($request->isPost()) {
            $del = $request->getPost('del');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteAlbum($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('album');
        }

        return [
            'id'    => $id,
            'album' => $this->table->getAlbum($id),
        ];
		
		
		
		
    }
	
	
	
}
	
	
	
