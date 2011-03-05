<?php



/**
 * Skeleton subclass for representing a row from the 'events' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ORM
 */
class Events extends BaseEvents {

	public function getImage() {
	
		$fileObj = $this->getFiles();
		if ($fileObj instanceof Files) {
			return Bones_Files_Image::createFromFile($fileObj);
		} else return new Bones_Files_Image();
		
	}
} // Events
