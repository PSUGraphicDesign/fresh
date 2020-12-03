<?php
namespace Deployer;

require 'recipe/composer.php';

// Project name
set('application', 'fresh');

// Project repository
set('repository', 'git@github.com:PSUGraphicDesign/fresh.git');

// [Optional] Allocate tty for git clone. Default value is false.
// set('git_tty', true);

// Use Git cache to speed up cloning new code:
set('git_cache', true);

// Allow multiplexing
set('ssh_multiplexing', true);

// Shared files/dirs between deploys
add('shared_files', [
    'app/site/config/config.{{hostname}}.php'
]);

add('shared_dirs', [
    'app/content',
    'app/thumbs',
    'app/site/cache',
    'app/site/accounts',
    'web/uploads',
]);

// Composer Settings
set('composer_options', '{{composer_action}} --no-dev --optimize-autoloader --no-progress --no-interaction --ignore-platform-reqs');

// Writable dirs by web server
add('writable_dirs', []);

// Hosts
inventory('hosts.yml');

// Tasks

// Build front-end assets
desc('Custom Pipeline: Build local assets');
task('build:render', function () {
    runLocally('npm run build');
});
after('deploy:update_code', 'build:render');

// Sync assets to release
desc('Custom Pipeline: Sync built assets to remote server');
task('build:sync', function () {
    upload('app/assets/css', '{{release_path}}/app/assets', ['options' => ['--recursive']]);
    upload('app/assets/js', '{{release_path}}/app/assets', ['options' => ['--recursive']]);
});
after('deploy:update_code', 'build:sync');

// Re-trigger this, as it isn't part of the default `composer` recipe:
after('deploy:vendors', 'deploy:writable');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

set('allow_anonymous_stats', false);
