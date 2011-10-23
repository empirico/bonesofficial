<?php



/**
 * Skeleton subclass for performing query and update operations on the 'album' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ORM
 */
class AlbumQuery extends BaseAlbumQuery {

    public function filterBySluggedIndex($slugged_index){

        $slices = split("-", $slugged_index);
        $id = $slices[0];
        return $this->filterById($id);
    }
} // AlbumQuery
