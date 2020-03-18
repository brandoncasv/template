<?php
namespace Deployer;

require 'vendor/sdkconsultoria/base/deploy.php';

// set default stage
set('default_stage', 'production');

// Project name
set('application', 'sdk_template');

// Project repository
set('repository', 'git@github.com:sdkconsultoria/template.git');

// Hosts
host('sdkconsultoria.com')
    ->stage('production')
    // ->set('user', 'www-data')
    // ->user('USER')
    ->port(22)
    ->set('deploy_path', '/var/www/html/{{application}}');
