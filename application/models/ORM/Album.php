<?php



/**
 * Skeleton subclass for representing a row from the 'album' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ORM
 */
class Album extends BaseAlbum {

	public function getCoverPhoto() {

		if ($this->getCoverPhotoId() > 0) {
			$photo = PhotosPeer::retrieveByPK($this->getCoverPhotoId());
		}
		return (@$photo instanceof Photos) ? $photo : new Photos();
        
	}

    public function getSluggedIndex() {

        $title_slug = Bones_Utils_Filter::slug_me($this->getTitle());
        return ($this->getId() . "-" . $title_slug . ".html");
    }
} // Album
