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

	public function getWebPath() {

		return '/upload/' . $this->getFullPath();

	}

    public function id_to_path(){

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

} // Files
