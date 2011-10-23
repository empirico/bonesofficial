<?php
class Bones_Files_Image extends Bones_Files_Base {

	const ALLOWED_EXTENSION 	= "jpg,jpeg";
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

    public function getFullThumbPath($size) {
        if (empty($this->filename)) return "";
        $height = $this->getHeight($size);
        $width = $size;
        $ratio = $height/$width;
        if ( $ratio < 1 ) $width =  ceil($size / $ratio);
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

    public function resize($w = null, $h = null) {

    	if (is_null($w) && is_null($h)) return;

    	$sourcePath = $this->base_path . "/" . $this->getPath() . "/" . $this->getFilename();
    	switch($this->getMimetype()) {

			case self::MIME_JPG :
			case self::MIME_JPEG :{
				$sourceImage =imagecreatefromjpeg($sourcePath);
			}
			break;
			case self::MIME_PNG: {
				$sourceImage =imagecreatefrompng($sourcePath);
			}
			break;
			default:
				return;
			break;
		}

		if ($sourceImage) {
			$sourceX = imageSX($sourceImage);
			$sourceY = imageSY($sourceImage);

			if (isset ($w) AND !isset ($h)) {
				// autocompute height if only width is set
				$h = (100 / ($sourceX / $w)) * .01;
				$h = @round ($sourceY * $h);
			} elseif (isset ($h) AND !isset ($w)) {
				// autocompute width if only height is set
				$w = (100 / ($sourceY / $h)) * .01;
				$w = @round ($sourceX * $w);
			}

			// Create the resized image destination
			$resized = @ImageCreateTrueColor ($w, $h);
			// Copy from image source, resize it, and paste to image destination
			@ImageCopyResampled ($resized, $sourceImage, 0, 0, 0, 0, $w, $h, $sourceX, $sourceY);
			// Output resized image
			$resized_fileName = $w . "_" . $this->getFilename();
			@ImageJPEG ($resized, $this->base_path . $this->id_to_path() . $resized_fileName);
		}
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