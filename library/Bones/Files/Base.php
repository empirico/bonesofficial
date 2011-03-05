<?php
class Bones_Files_Base extends Files {

	protected $uploader;
	private $error_messages;
	protected $base_path;
	
	public function __construct() {
		
		parent::__construct();
		
		$config = Zend_Registry::get('config');
		$this->base_path = $config->bones->uploaddir;
		$this->uploader = new Zend_File_Transfer_Adapter_Http();
		$this->uploader->setOptions(array('useByteString' => false));
	}
	
	public function setData(){
		
		//$this->uploader = new Zend_File_Transfer_Adapter_Http();
		$this->setFilename(Bones_Utils_Filter::clean_filename($this->uploader->getFileName(null,false)));
		$this->setMimetype($this->uploader->getMimeType());
		$this->setSize($this->uploader->getFileSize());
	}
	
	public function uploadfile(){

		if (!$this->uploader->isValid()){
			$this->error_messages = $this->uploader->getMessages();
			throw new Bones_Files_Exception('');
		}
		//se è valido, allora salvo il DB,
		$this->save();
		try {
			$this->uploader->setDestination($this->base_path);
			
			$src = $this->uploader->getDestination() . $this->uploader->getFileName();
			$dest = $this->uploader->getDestination() . "/" . $this->id_to_path() .  Bones_Utils_Filter::clean_filename($this->uploader->getFileName(null,false));
			
			$this->uploader->addFilter('Rename', array('target' => $dest));
		
			if( $this->uploader->receive()){
				$this->setData();
				$this->save();
			
			} else {
				$this->error_messages = $this->uploader->getMessages();
				throw new Bones_Files_Exception('');
			}
		} catch (Bones_Files_Exception $e) {
			$this->delete();
			$this->error_messages[] = $e->getMessage();
			throw $e;
		}
		
	}
	
	public function getErrorMessages(){
		return $this->error_messages;
	} 

	protected function id_to_path(){
	
		$hex = str_split(sprintf("%08X",$this->getId()));
		$path = "/";
		foreach ($hex as $d) {
			$path .= $d . "/";
			if (!is_dir($this->base_path . $path)){
				mkdir($this->base_path . $path, 0777);
				//chown($this->base_path . $path, 'apache');
			}
		}
		
		return $path;
	
	}
	
	public function getWebPath() {
		return "/upload/";
	}
	
	public function getPath(){
		 return $this->id_to_path();
	}

	public function delete(PropelPDO $con = null) {
	
		//@unlink($this->base_path . $this->id_to_path() ."/*");
		//@rmdir($this->base_path . $this->id_to_path());
		@exec('rm -rf ' .$this->base_path . $this->id_to_path());
		parent::delete($con);
	}
	

}
