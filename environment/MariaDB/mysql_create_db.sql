CREATE DATABASE IF NOT EXISTS whosaiditfriends;
CREATE USER IF NOT EXISTS 'ws_ad_gyorgy'@'localhost' IDENTIFIED BY 'WsiF!BGDS@2018_rz';
GRANT ALL PRIVILEGES ON whosaiditfriends.* TO 'ws_ad_gyorgy'@'localhost';
FLUSH PRIVILEGES;
