<?php
class Zend_Db_Schema_Table
{
    function __construct($adapter, $tableName, $hasPrimaryColumn = true) {}
    function removeColumn($name) {}
    function addColumn($name, $type, $options = array()) {}
    function save() {}

    protected function _loadTable() {}
    protected function _getGenericType($typeName) {}


}