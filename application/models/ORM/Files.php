<?php



/**
 * Skeleton subclass for representing a row from the 'files' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ORM
 */
class Files extends BaseFiles {

	public function getFullPath(){
	$path = "";
	$hex = str_split(sprintf("%08X",$this->getId()));
		foreach ($hex as $d) {
			$path .= $d . "/";
			
		}
		return $path . $this->getFilename();
	
	}
	
	public function getWebPath() {
	
		return '/upload/' . $this->getFullPath();
	
	}

} // Files
