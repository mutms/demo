<?php  // Moodle configuration file

if (!getenv('DEMO_PORT', true)) {
    die('Not a DEMO container!');
}

unset($CFG);
global $CFG;
$CFG = new stdClass();

ini_set('error_log', '/var/www/php_error.log');
ini_set('log_errors', '1');
ini_set('zend.exception_ignore_args', true);

$CFG->dbtype    = 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'db';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'moodle';
$CFG->dbpass    = 'm@0dl3ing';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = [];

$CFG->wwwroot   = 'http://127.0.0.1:' . getenv('DEMO_PORT');

$CFG->dataroot  = '/var/www/dataroot';
$CFG->admin     = 'admin';
$CFG->directorypermissions = 02777;
$CFG->noemailever = '1';
$CFG->noreplyaddress = 'noreply@example.com';
$CFG->supportemail = 'support@example.com';
$CFG->site_is_public = false;

$CFG->debug = (E_ALL | 2048);
$CFG->debugdisplay = 1;
$CFG->debug_developer_use_pretty_exceptions = 0;
$CFG->allowthemechangeonurl = 1;
$CFG->passwordpolicy = 0;
$CFG->cronclionly = 0;
$CFG->cron_keepalive = '0';
$CFG->pathtophp = '/usr/local/bin/php';

$CFG->routerconfigured = true;

require('/var/www/site/moodle/public/lib/setup.php');
