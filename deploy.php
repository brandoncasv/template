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
    ->port(22)
    ->set('deploy_path', '/var/www/html/{{application}}');

host('trial.sdkconsultoria.com')
    ->stage('staging')
    // ->set('user', 'www-data')
    ->port(22)
    ->set('deploy_path', '/var/www/html/{{application}}');

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);
