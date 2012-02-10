<?php
class Bones_Acl_Acl extends Zend_Acl {


	public function __construct() {

		$this->loadRoles();
		$this->loadResources();
		$this->loadDefaults();


		$permissions = AclPermissionsQuery::create()->find();

		foreach ($permissions as $p) {

		    //$p = new AclPermissions();
            $actions = is_null($p->getActions()) ? null : split('#', $p->getActions());
			if (!($p->getAclRoles() instanceof AclRoles)) continue;
			$roleName = $p->getAclRoles()->getName();
            if ($p->getPermission() == 0) {

                $this->deny( $roleName , $p->getModule() . ":" . $p->getResource(), $actions);
            } else {
                $this->allow($roleName, $p->getModule() . ":" . $p->getResource(), $actions);
            }
        }

    }

  private function loadDefaults() {

  		$this->add(new Zend_Acl_Resource('admin:login'));
  		$this->add(new Zend_Acl_Resource('admin:error'));
        $this->add(new Zend_Acl_Resource('admin:logout'));
        $this->add(new Zend_Acl_Resource('admin:index'));

        $this->add(new Zend_Acl_Resource('default:error'));
        $this->add(new Zend_Acl_Resource('default:index'));
        $this->add(new Zend_Acl_Resource('default:login'));
        $this->add(new Zend_Acl_Resource('default:help'));
        $this->add(new Zend_Acl_Resource('default:access'));


        $this->allow(null, 'admin:login');
        $this->allow(null, 'admin:logout');
        $this->allow(null, 'admin:error');
        $this->allow(null, 'admin:index');

        $this->allow(null, 'default:error');
        $this->allow(null, 'default:index');
        $this->allow(null, 'default:login');
        $this->allow(null, 'default:help');
        $this->allow(null, 'default:access');

  }
  private function loadRoles(){

  		$roles = AclRolesQuery::Create()->find();
  		foreach ($roles as $role) {
			if ($this->role_exists($role->getName())) continue;
				$parent_role = $role->getAclRolesRelatedByParentRole();
			if ( $parent_role instanceof AclRoles ) {
				if (!$this->role_exists($parent_role->getName())) $this->addRole(new Zend_Acl_Role($parent_role->getName()));
				$this->addRole(new Zend_Acl_Role($role->getName()), $parent_role->getName());
			} else {
				$this->addRole(new Zend_Acl_Role($role->getName()));
			}
		}
  }

  private function loadResources() {
  	$res = AclPermissionsQuery::create()->groupByResource()->groupByModule()->find();
  	foreach($res as $r){
  		$this->add(new Zend_Acl_Resource($r->getModule() . ":" .$r->getResource()));
  	}
  }


	private function role_exists($role){
		return in_array($role, $this->getRoles());
	}

	public function isUserAllowed($role = null, $resource = null,$action = null){

		try {
			$this->get($resource);
			return $this->isAllowed($role, $resource, $action);
		}catch (Exception $e) {
			return false;
		}
	}

	public function getAllowedResources(Bones_Auth_Base $auth, $module){

		$components = array();
		$permissions = AclPermissionsQuery::create()->filterByModule($module)
			->filterByPermission(1)->groupByResource()->find();

		$role = $auth->getRole();

		foreach($permissions as $p) {

			$resource = $module . ":" . $p->getResource();
			if ($this->isUserAllowed($role, $resource,'on_menu')) {
				$components[] = $p->getResource();
			}

		}
		return $components;
	}
}
