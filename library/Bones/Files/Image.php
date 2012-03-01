<?php
class Bones_Files_Image extends Bones_Files_Base {

	const ALLOWED_EXTENSION 	= "jpg,jpeg,png";
	const MAX_FILESIZE 			= '5MB';
	const THUMB_WIDTH 			= '150';
	const MIME_JPG				= 'image/jpg';
	const MIME_JPEG				= 'image/jpeg';
	const MIME_PNG				= 'image/png';


	public function __construct(){
		parent::__construct();
		$this->base_path .= "images/";
		$this->uploader->addValidator('Size', true, self::MAX_FILESIZE)
		     ->addValidator('FilesSize', true, self::MAX_FILESIZE)
          ->addValidator('Extension', true, self::ALLOWED_EXTENSION);

    }

    public function getWebPath() {
    	return parent::getWebPath() . "images";
    }

    public function getFullPath($width = '') {
    	if (empty($this->filename)) return "";
    	$width = (!empty($width)) ? $width . "_" : '';
    	return $this->getWebPath() . $this->id_to_path() . $width . $this->getFilename();

    }


    private function getBlob($width = '') {

    	$width = (!empty($width)) ? $width . "_" : '';
    	$fullpath =  $this->base_path . $this->id_to_path() . $width . $this->getFilename();
    	if (!file_exists($fullpath)) return null;

	    switch($this->getMimetype()) {

				case self::MIME_JPG :
				case self::MIME_JPEG :{
					$sourceImage =imagecreatefromjpeg($fullpath);
				}
				break;
				case self::MIME_PNG: {
					$sourceImage =imagecreatefrompng($fullpath);
				}
				break;
				default:
					return null;
				break;
			}
			return $sourceImage;
    }
    
	public function getHeight($width = '') {
		$source = $this->getBlob($width);
		if (is_null($source)) return "100%";
		return imagesy($source);
	}

	public static function createFromFile($fileObject){

		$img = new Bones_Files_Image();
		$img->fromArray($fileObject->toArray());
		return $img;
	}

}