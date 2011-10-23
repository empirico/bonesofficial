<?php



/**
 * Skeleton subclass for representing a row from the 'gallery' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ORM
 */
class Gallery extends BaseGallery {
    
    public function getPublicAlbums() {
        $criteria = AlbumQuery::create()->filterByIsPublic(1)->orderByRank(Criteria::DESC);
        return $this->getAlbums($criteria);
    }
} // Gallery
