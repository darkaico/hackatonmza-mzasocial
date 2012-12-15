<?php
// ...other code
// AppFog Extraction
$services_json = json_decode(getenv('VCAP_SERVICES'),true);
$af_mysql_config = $services_json['mysql-5.1'][0]['credentials'];
// Database settings
Configure::write('Database.config', array(
    'default' => array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => $af_mysql_config['hostname'],
        'login' => $af_mysql_config['username'],
        'password' => $af_mysql_config['password'],
        'database' => $af_mysql_config['name'],
        'prefix' => '',
        'encoding' => 'utf8',
    )
));