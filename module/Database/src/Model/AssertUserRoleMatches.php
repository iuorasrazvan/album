<?php 

namespace Database\Model;   

use Zend\Permissions\Rbac\AssertionInterface;
use Zend\Permissions\Rbac\Rbac;
use Zend\Permissions\Rbac\RoleInterface;  

class AssertUserRoleMatches extends User implements AssertionInterface  {
	
	
	
	protected $article;
	
	  public function __construct()
    {
        $this->userId =$this->getUser(id) ;
    }
	
	
	
	 public function setArticle(Article $article)  {
		 
        $this->article = $article;
    }
	
	
	 public function assert( Rbac $rbac, RoleInterface $role = null, string $permission = null)
    {
        if (! $this->article) {
            return false;
        }
        return ($this->userId === $this->article->getUserId());
    }

	
	
}