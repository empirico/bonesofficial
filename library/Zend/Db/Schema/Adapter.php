<?php
abstract class Zend_Db_Schema_Adapter
{
    /**
     * @var Zend_Db_Adapter_Abstract
     */
    protected $_db;

    

    abstract function createTable($name, $columns);
    abstract function getType($genericType, $requestedlength);

    function dropTable($tableName) {}

    /**
     * call through to the underlying Zend_Db_Adapter
     */
    function __call($name, $arguments) {}

    

}