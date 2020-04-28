<?php

use \UniEngine\Utils\Migrations as Migrations;

use UniEngine\Utils\Migrations\FSHandler;

/**
 * Changelog:
 *  - Removes now obsolete constant "GAMEURL_REMOTE_TESTSERVERHOST"
 *    from "includes/constants.php".
 *
 */
class Migration_20200428 implements Migrations\Interfaces\Migration {

    public function __construct() {
        $this->fsHandler = new FSHandler([
            "rootPath" => "./"
        ]);
    }

    public function up() {
        $db = $this->getDBDriver();

        $db->executeQuery(
            "ALTER TABLE `{{table(users)}}` " .
            "ADD COLUMN `tech_resource_all` int(10) unsigned NOT NULL DEFAULT '0'" .
            "SET DEFAULT '0';"
        );
    }

    public function down() {
        $db = $this->getDBDriver();

        $db->executeQuery(
            "ALTER TABLE `{{table(users)}}` " .
            "DROP COLUMN `tech_resource_all`;"
        );
    }

    public function isPriorManualActionRequired() {
        return false;
    }

    public function getPreviousProjectVersion() {
        return "1.0.0";
    }
}

?>
