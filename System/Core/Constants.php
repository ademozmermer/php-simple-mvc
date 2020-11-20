<?php

// Directory Separator
define('DS', '/');

// Base Directory
define('BASE_DIR', implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)));

// Root Directory
define('ROOT_DIR', str_replace('Public', '', realpath(getcwd())));

// App Directory
define('APP_DIR', ROOT_DIR . DS . 'App' . DS);

// System Directory
define('SYSTEM_DIR', ROOT_DIR . DS . 'System' . DS);

// Controller Directory
define('CONTROLLER_DIR', APP_DIR . 'Controllers' . DS);

// Model Directory
define('MODEL_DIR', APP_DIR . 'Models' . DS);

// View Directory
define('VIEW_DIR', APP_DIR . 'Views' . DS);

// Public Directory
define('PUBLIC_DIR', BASE_DIR . DS . 'Public' . DS);


// Default Timezone
define('TIMEZONE', 'Europe/Istanbul');