<?php



/**
 * Skeleton subclass for performing query and update operations on the 'events' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ORM
 */
class EventsPeer extends BaseEventsPeer {

	const TYPE_LIVE = "live_show";
	const TYPE_GENERIC = "generic";
	
	
	public static function getTypes() {
	
		return array(self::TYPE_LIVE => self::TYPE_LIVE,self::TYPE_GENERIC => self::TYPE_GENERIC);
	}
	
	public static function getLatestLives($count = 5) {
		return EventsQuery::create()
    	->filterByEventType(EventsPeer::TYPE_LIVE)
    	->filterByIsPublic(1)
    	->addDescendingOrderByColumn(EventsPeer::START_DATE)
    	->setLimit(5)->find();
	}
	
	public static function getLatestGeneric($count = 5) {
		return EventsQuery::create()
    	->filterByEventType(EventsPeer::TYPE_GENERIC)
    	->filterByIsPublic(1)
    	->addDescendingOrderByColumn(EventsPeer::START_DATE)
    	->setLimit(5)->find();
	}
	
	public static function getLatest($count = 5){
		return EventsQuery::create()
    	->filterByIsPublic(1)
    	->addDescendingOrderByColumn(EventsPeer::START_DATE)
    	->setLimit(5)->find();
	}
} // EventsPeer
