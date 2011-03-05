<?php
class Zend_Db_Schema_Manager
{
    protected   $_dir;
    /**
     * @var Zend_Db_Adapter_Abstract
     */
    protected   $_db;
    public      $migration_table;

    function __construct($dir, $db) {

        $this->_db = $db;
        Zend_Db_Table::setDefaultAdapter($this->_db);

        $this->migration_table = $this->getMigrationTable();

    }

    function getCurrentSchemaVersion() {

       $this->migration_table->fetchRow($this->migration_table->select()->order('version DESC')->limit(1,1));
       $version = (count($rowset)>0) ? $rowset['version'] : 'none';
       return $version;
    }

    function run($version = null) {}

    private function getMigrationTable(){
        $migration_table = new Zend_Db_Table('migrations');
        if ($migration_table->getDefinition() == null) {
            $sql =      "CREATE TABLE IF NOT EXISTS `migrations` ( `version` bigint(20) NOT NULL,
                            `migration_name` varchar(255) NULL,
                             PRIMARY KEY (`version`)
                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8";
            $this->_db->query($sql);
            $migration_table = new Zend_Db_Table('migrations');
        }
        return $migration_table;
    }

    protected function _getMigrationFiles($currentVersion, $stopVersion=null) {}

    protected function _processFile($file, $direction) {}

    protected function _updateSchemaVersion($direction, $version, $last_change = '') {}

    protected function _getAppliedMigrations(){

        return $this->migration_table->fetchAll($this->migration_table->select()->order('version'));

    }
}