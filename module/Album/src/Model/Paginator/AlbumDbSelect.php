<?php 

	
	namespace Album\Model\Paginator;
	
	use Zend\Paginator\Adapter\DbSelect;
	use Zend\Paginator\Paginator;
	use Zend\Db\Sql\Select;  

	
	
	class AlbumDbSelect extends DbSelect  {
		
		
		public function count()   {
			if ($this->rowCount) {
					return $this->rowCount;
				}

				$select = new Select();
				$select
				  ->from('item_counts')
				  ->columns(['c'=>'post_count']);

				$statement = $this->sql->prepareStatementForSqlObject($select);
				$result    = $statement->execute();
				$row       = $result->current();
				$this->rowCount = $row['c'];

				return $this->rowCount;
			
		
		
		}
		
		
		
		
		
	}