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
desc('Deploy tailwindcss');
task('tailwindcss:deploy', function () {
    $output = run('{{bin/php}} {{release_path}}/artisan tailwindcss:download');
    writeln("<info>$output</info>");
    $output = run('{{bin/php}} {{release_path}}/artisan tailwindcss:build --prod');
    writeln("<info>$output</info>");
});

desc('Migrate without action');
task('artisan:migrate')->disable();

// Hooks

after('deploy:failed', 'deploy:unlock');

before('deploy:publish', 'tailwindcss:deploy');
