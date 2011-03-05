<?php
class Bones_Files_Doc extends Bones_Files_Base {

	const ALLOWED_EXTENSION = "doc, pdf, rtf";
	const MAX_FILESIZE = '3MB';
	
	
	public function __construct(){
		parent::__construct();
		$this->base_path .= "doc/";
		$this->uploader->addValidator('Size', true, self::MAX_FILESIZE)
		     ->addValidator('FilesSize', true, self::MAX_FILESIZE)
          ->addValidator('Extension', true, self::ALLOWED_EXTENSION);
    }



}