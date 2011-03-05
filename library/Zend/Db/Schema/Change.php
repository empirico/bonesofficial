<?php
abstract class Zend_Db_Schema_Change
{
    /**
     * @var Zend_Db_Schema_Adapter_Abstract
     */
    protected $_db;


    function __construct($db) {}

    /**
     * @return Zend_Db_Schema_Table
     */
    function table() {}

    /**
     * Changes to be applied in this change
     */
    abstract function up();

    /**
     * Rollback changes made in up()
     */
    abstract function down();

}