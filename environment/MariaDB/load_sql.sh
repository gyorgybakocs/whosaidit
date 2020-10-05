#!/bin/bash

cd /var/www/whosaiditfriends.com
/usr/bin/env php artisan import:tvseries /files/quotes.csv
/usr/bin/env php artisan import:quotes /files/quotes.csv
