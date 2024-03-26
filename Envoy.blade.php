@servers(['ali94' => ['root@120.24.176.94'], 'localhost' => '127.0.0.1'])

@task('deploy', ['on' => 'ali94'])
    su www
    cd /www/wwwroot/www.myjobboard.com
    git pull origin main
    composer install --optimize-autoloader --no-dev
    php artisan migrate
@endtask
