<?php 

namespace Album\Model;

use RuntimeException;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\ResultSet\ResultSet;  
use Zend\Db\Sql\Select;

use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Adapter\ArrayAdapter;  
use Zend\Paginator\Paginator;

use Album\Model\Paginator\AlbumDbSelect;  




class AlbumTable

{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated)  {
		
		if ($paginated)  {
			
			return $this->fetchPaginatedResults();
			
		}
        return $this->tableGateway->select();
    }
	
	public function  fetchPaginatedResults ()   {
		
		
		
		$select = new Select ($this->tableGateway->getTable());  
		$resultSet =new ResultSet ();  
		$resultSet->setArrayObjectPrototype (new Album);  
		
		$paginatorAdapter = new DbSelect ($select, $this->tableGateway->getAdapter(), $resultSet);  
		

		
		$paginator = new Paginator ($paginatorAdapter); 
		
		return $paginator;  
		
		
		
	}
	
	

    public function getAlbum($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveAlbum(Album $album)
    {
		
        $data = [
            'artist' => $album->artist,
            'title'  => $album->title,
			'user'=>serialize($album->user), 
        ];
		

		
		$id=isset($album->id)? $album->id:0;
		
    

        if ($id === 0) {
            $this->tableGateway->insert($data);
			
            return ; 
        }

        if (! $this->getAlbum($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
	
	
	public function getIdAlbum($title)  {
		$resultSet=$this->tableGateway->select(['title'=>$title]);
		
		return $resultSet->current()->id;
		
	}
}