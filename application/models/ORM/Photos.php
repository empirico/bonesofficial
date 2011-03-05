<?php



/**
 * Skeleton subclass for representing a row from the 'photos' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ORM
 */
class Photos extends BasePhotos {
	
	public function delete(PropelPDO $con = null) {
	
		$file = $this->getFiles();
    	if ($file instanceof Files) {
    		parent::delete($con);
    		$image = $this->getImage();
    		$image->delete();
    	}
	}
	
	public function getImage() {
		$fileObj = $this->getFiles();
		if ($fileObj instanceof Files) {
			return Bones_Files_Image::createFromFile($fileObj);
		}
	}

} // Photos
