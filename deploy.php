<?php
namespace Deployer;

require 'recipe/laravel.php';

// set default stage
set('default_stage', 'production');

// Project name
set('application', 'sdk_template');

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

//Global config
set('http_user', 'www-data');

// set permisions
set('writable_use_sudo', true);
set('clear_use_sudo', true);
set('cleanup_use_sudo', true);

// Project repository
set('repository', 'git@github.com:sdkconsultoria/template.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

// Tasks

//Generate optimize bundles
task('fix:npm_build', function () {
    run('npm run build:back');
    run('npm run build:front');
})->local();

//Send optimize functions
task('fix:npm_send', function () {
    upload(__DIR__ . "/public/bundle-back.js", '{{release_path}}/public/bundle-back.js');
    upload(__DIR__ . "/public/bundle-front.js", '{{release_path}}/public/bundle-front.js');
});

//Fixed user-own
task('fix:permisions', function () {
    run('sudo chown www-data:www-data {{release_path}} -R');
});

//Group Fix
task('fix', [
    'fix:npm_build',
    'fix:npm_send',
    'fix:permisions',
]);

task('build', function () {
    run('cd {{release_path}} && build');
});

//Group Fix
task('sdk-deploy', [
    'deploy',
    'fix',
]);

//back to previus release
// task('npm', function () {
//     if (has('previous_release')) {
//         run('cp -R {{previous_release}}/node_modules {{release_path}}/node_modules');
//     }
//
//     run('cd {{release_path}} && npm install');
// });

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
