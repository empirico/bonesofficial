<?php



/**
 * Skeleton subclass for representing a row from the 'journal_post' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ORM
 */
class JournalPost extends BaseJournalPost {

    const FILE_IMG = 'IMG';
    const FILE_DOC = 'DOC';

    public function getFile(){

        switch ($this->getFileType()) {
            case self::FILE_IMG:  {
               return Bones_Files_Image::createFromFile($this->getFiles());
            }
            break;
            case self::FILE_DOC: {
               return Bones_Files_Doc::createFromFile($this->getFiles());
            }
            break;
            default:
                return null;
            break;

        }
    }


    public function getAbstractFromContent($lenght = 255) {

        $text = $this->getContent();
        $text = substr(stripslashes(strip_tags($text)), 0, $lenght);
        return $text . " ...";
    }

    public function getSmartCreated() {
        $date = new Zend_Date($this->getCreated(), 'it_IT');
        return $date->get(Zend_Date::DATE_MEDIUM, 'en_US');
    }
} // JournalPost
