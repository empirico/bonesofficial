<?php

/**
 * Skeleton subclass for representing a row from the 'journal' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ORM
 */
class Journal extends BaseJournal {

    public function getLatestPublicPost($count = 3) {

        return JournalPostQuery::create()->filterByJournal($this)
                        ->filterByIsPublic(1)
                        ->orderByStartDate(Criteria::DESC)
                        ->limit($count)->find();
    }


    public static function getPostBySlug($journal_id, $slug) {
        return JournalPostQuery::Create()->filterByJournalId($journal_id)
                ->findOneByTitleSlug($slug);
    }
}

// Journal
