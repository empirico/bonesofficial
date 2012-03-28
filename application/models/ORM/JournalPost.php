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

    public function getFile() {
        if (!($this->getFiles() instanceof Files)) return null;
        switch ($this->getFileType()) {
            case self::FILE_IMG: {
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

    public function getAbstractFromContent($lenght = 3) {
        $abstract = "";
        $text = $this->getContent();
        //$text = stripslashes(strip_tags($text));
        $text_array = explode("<br />", $text);
        $ceil = min($lenght, count($text_array)-1);
        $i = 0;
        for ($i == 0; $i <= $ceil; $i++) {
            $sentence = stripslashes(strip_tags($text_array[$i]));
            $abstract .= trim($sentence).  "\n";
        }
        return nl2br($abstract);
    }

    public function getSmartCreated() {
        $date = new Zend_Date($this->getCreated(), 'it_IT');
        return $date->get(Zend_Date::DATE_MEDIUM, 'en_US');
    }

    public function getSmartStartDate() {
        $date = new Zend_Date($this->getStartDate(), 'it_IT');
        return $date->get(Zend_Date::DATE_MEDIUM, 'en_US');
    }

    public function getStartDateObject() {
        return new Zend_Date($this->getStartDate(), 'it_IT');
    }

    public function getAllPostImages($lenght = 3) {

        $sources = array();
        $html = $this->getContent();
        $sources = Bones_Utils_Filter::extract_img_sources($html);
        if ($this->getFileType() == self::FILE_IMG) {
            $post_image = Bones_Files_Image::createFromFile($this->getFiles());
            array_unshift($sources, $post_image->getFullPath(1024));
        }
        $lenght = min (count($sources), $lenght);
        $sources = array_slice($sources, 0, $lenght);
        return $sources;

    }

    public function getTitle() {
        return stripslashes(parent::getTitle());
    }

    public function getContent() {
        return stripslashes(parent::getContent());
    }
}

// JournalPost
