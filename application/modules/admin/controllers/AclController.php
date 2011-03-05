<?php
/**
 * http://www.trirand.com/blog/jqgrid/jqgrid.html
 */
class Admin_AclController extends Bones_Controller_Admin
{

	public function init() {
	
		parent::init();
		$this->view->roles = AclRolesQuery::create()->find();
	
	}
    public function indexAction()
    {
      $permissions = AclPermissionsQuery::Create()->addAscendingOrderByColumn(AclPermissionsPeer::MODULE)->addAscendingOrderByColumn(AclPermissionsPeer::ROLE_ID)->find();
      $this->view->permissions = $permissions;
      
    }

    public function rolesAction(){
    	
    }

    public function getDataAction(){

        $page   = $this->getRequest()->getParam('page');
        $limit  = $this->getRequest()->getParam('rows');
        $sidx   = $this->getRequest()->getParam('sidx');
        $sord   = $this->getRequest()->getParam('sord');
        $result = array();
        $perm   = AclPermissionsQuery::Create()->find();


        $count  = count($perm);
        if( $count > 0 ) { $total_pages = ceil( $count / $limit); } else { $total_pages = 0; }
        if ($page > $total_pages) $page=$total_pages;

        $perm = AclPermissionsQuery::Create()->limit($limit)->find()->toArray();
        $data           = new stdClass();
        $data->page     = $page;
        $data->total    = $total_pages;
        $data->records  = $count;
        foreach ($perm as $permission) {
            //var_dump(array_values($permission));
            $result[] = array('id'=> $permission['Id'],
                                'cell' => array_values($permission)
                                );
        }
        $data->rows = $result;
        $this->_helper->layout->disableLayout();
        $this->view->json = json_encode($data);
    }

    public function saveAction(){
        $this->_helper->layout->disableLayout();

        $postData = $this->getRequest()->getPost();
        
        $action = current(array_keys($postData['submit']));
        $id = current(array_keys($postData['submit'][$action]));
        
        
        $admP = AclPermissionsPeer::retrieveByPK($id);
        if (!($admP instanceof AclPermissions)) {
            $admP = new AclPermissions();
        }
        
    
    	switch ($action)  {
    	
    		case 'del' :{
    			$admP->delete();
    		}
    		break;
    		case 'save': {
    		
    			$admP->setActions($postData['actions'][$id]);
		        $admP->setModule($postData['module'][$id]);
		        $admP->setRoleId($postData['role_id'][$id]);
		        $admP->setResource($postData['resource'][$id]);
		        $admP->setPermission($postData['permission'][$id]);
		       	$admP->save();
    		}
    		break;
    	
    	}
    	
        
        
       $this->_redirect($this->view->url(array('action' => 'index')));
    }


    public function saveRolesAction() {
    
    	$this->_helper->layout->disableLayout();
        $postData = $this->getRequest()->getPost();
        
        $action = current(array_keys($postData['submit']));
        $id = current(array_keys($postData['submit'][$action]));

        $role = AclRolesPeer::retrieveByPK($id);
        if (!($role instanceof AclRoles)){
        
        	$role = new AclRoles();
        	
        }
    
    	switch ($action)  {
    	
    		case 'del' :{
    			$role->delete();
    		}
    		break;
    		case 'save': {
    		
    			$role->setName($postData['name'][$id]);
		        $role->setParentRole($postData['parent_role'][$id]);
		        $role->save();
    		}
    		break;
    	
    	}
   		$this->_redirect($this->view->url(array('action' => 'roles')));
    
    }



}

