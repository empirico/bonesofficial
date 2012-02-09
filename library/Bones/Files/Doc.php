<?php
class Bones_Files_Doc extends Bones_Files_Base {

	const ALLOWED_EXTENSION = "doc, pdf, rtf,txt,zip";
	const MAX_FILESIZE = '5MB';


	public function __construct(){
		parent::__construct();
		$this->base_path .= "doc/";
		$this->uploader->addValidator('Size', true, self::MAX_FILESIZE)
		     ->addValidator('FilesSize', true, self::MAX_FILESIZE)
          ->addValidator('Extension', true, self::ALLOWED_EXTENSION);
    }

    public static function createFromFile($fileObject){

		$doc = new Bones_Files_Doc();
		$doc->fromArray($fileObject->toArray());
		return $doc;
	}

    public function getWebPath() {
    	return parent::getWebPath() . "doc";
    }

    public function getFullPath(){
		return $this->getWebPath() . $this->id_to_path() . $this->getFilename();
	}


}