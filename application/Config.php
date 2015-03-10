<?php

/*
 * -------------------------------------
 * framework mvc basico
 * Config.php
 * -------------------------------------
 */


define('BASE_URL', 'http://spb.mesa.com/');
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_LAYOUT', 'twb');
define('FPDF_FONTPATH', ROOT. 'libs/font');

#Project Info
define('APP_NAME', 'Mesa de Entradas');
define('APP_SLOGAN', 'Dirección Provincial de Salud Penitenciaria');
define('APP_COMPANY', 'DPSP');
define('SESSION_TIME', 10); # Si este valor esta en 0 el tiempo de la sesion no expirará
define('HASH_KEY', '4f6a6d832be79');

# Database connection info
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123456');
define('DB_NAME', 'mesa');
define('DB_CHAR', 'utf8');

# LOGGIN CONFIGS

/**
 * Database Table Constants - these constants
 * hold the names of all the database tables used
 * in the script.
 */
define("TBL_LOG", "log");     //Database where logs will be stored
// Security constant, the one you'll have to use in order to delete the log:
define("LOG_PASS", ""); //MUST be sha1 encoded 
define("LOG_LIB", ROOT."models/logsModel.php");

/**
 * Email Constants - these specify what goes in
 * the from field in the emails that the script
 * sends to users, and whether to send a
 * welcome email to newly registered users.
 */
define("SITE_NAME", "Mesa de Entradas");
define("EMAIL_FROM_NAME", "Nicolas Magliaro");
define("EMAIL_FROM_ADDR", "nicolasmagliaro@gmail.com");
define("EMAIL_TO_ADDR", "nicolasmagliaro@gmail.com");
?>
