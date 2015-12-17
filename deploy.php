<?php

require 'recipe/composer.php';

server('prod', '192.168.33.99', 22)
    ->user('vagrant')
    ->forwardAgent()
    ->stage('production')
    ->env('deploy_path', '/var/www/testdeploy');

set('repository', 'https://github.com/jeroenvdgulik/deployer-demo.git');

task('reload:php-fpm', function () {
    run('sudo /usr/sbin/service php5-fpm reload');
});

after('deploy', 'reload:php-fpm');
