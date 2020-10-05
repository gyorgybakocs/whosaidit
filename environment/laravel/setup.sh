#!/bin/bash

cp -rvf /files/img/ /var/www/whosaiditfriends.com/public/
chown -R www-data /var/www/whosaiditfriends.com/public/img
chmod -R 775 /var/www/whosaiditfriends.com/public/img

cd /var/www/whosaiditfriends.com

chown -R www-data storage
chown -R www-data bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache
mkdir -p tmp tmp/log

cp -rvf /files/sass/ /var/www/whosaiditfriends.com/resources/
chown -R root /var/www/whosaiditfriends.com/resources/
chmod -R 777 /var/www/whosaiditfriends.com/resources/

composer update

npm install axios cross-env laravel-mix --save-dev
npm run dev
