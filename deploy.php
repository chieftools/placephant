<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@gitlab.com:tjvb/placephant.git');

add('shared_files', []);
set('shared_dirs', [
    'storage/app/elephpants',
    'storage/logs/',
]);
add('writable_dirs', []);

// Hosts

host('placephant.com')
    ->set('remote_user', 'placephant')
    ->set('deploy_path', '~/placephant');

// Tasks

desc('Migrate without action');
task('artisan:migrate')->disable();

desc('Update githash cache');
task('githash:cache', function () {
    runLocally('GITHASH_CACHE_ENABLED=true php artisan about');
});

task('build', function () {
    runLocally('npm ci', ['timeout' => 600]);

    runLocally('npm run build', ['timeout' => 600]);
});

task('deploy:update_code', function () {
    runLocally('rm -Rf build coverage phploc phpmetrics node_modules .env public/storage');
    upload(__DIR__ . "/", '{{release_path}}');
});

// Hooks

after('deploy:failed', 'deploy:unlock');

before('deploy:update_code', 'build');
// The cache contains page cache that is invalid after a deployment
after('deploy:symlink', 'artisan:cache:clear');

before('deploy:update_code', 'githash:cache');
