<?php 

namespace Album\Controller; 

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\AlbumTable;

use Album\Form\AlbumForm;
use Album\Model\Album;
use Album\Filter\AlbumFilter;

use Zend\Session\Container;  



class AlbumController extends AbstractActionController   {
	
	private $table;

    // Add this constructor:
    public function __construct(AlbumTable $table)
    {
        $this->table = $table;
		
		$this->filter=new AlbumFilter (); 
    }
    public function indexAction()
    {
		$container =new Container('login');
		$user=$container->userLogin->name;  
		
		return new ViewModel([
            'albums' => $this->table->fetchAll(),
			'user'=>$user
        ]);
		
		
    }

    public function addAction()
	
    {
		$form=new AlbumForm ();  
		
		$form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }
		


		$album = new Album();
		
		$form->setInputFilter($this->filter->getInputFilter()); 
     
        $form->setData($request->getPost());
		

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $album->exchangeArray($form->getData());
		
        $this->table->saveAlbum($album);
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
	
	
	public function loginMessageAction ()   {
			
		
		
	}
}
	
	
	
