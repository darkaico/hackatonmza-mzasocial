<?php
// Load base configuration. Any of the core settings can be
// overridden here. Don't delete the $config var!
$config = array(
    'debug' => 1
);
// If declared in the $config array, String::UUID() crashes
Configure::write('Security.salt', 'Lasdaqjweqkwbd1i34b23lk5b2lkj12b');
Configure::write('Security.cipherSeed', 'asdfbaldkb1j231241123');
// Database settings
Configure::write('Database.config', array(
    'default' => array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => '127.0.0.1',
        'login' => 'root',
        'password' => 'root',
        'database' => 'hackaton_mza',
        'prefix' => '',
        'encoding' => 'utf8'    
    )
));
// Custom Log file settings to ROOT/data/logs/
CakeLog::config('default', array(
    'engine' => 'FileLog',
    'path'   => ROOT . DS . 'data' . DS . 'logs' . DS
));