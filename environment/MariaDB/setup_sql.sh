#!/bin/bash

RPWD=DB_ROOT_PASSWORD=

DB=DB_DATABASE=
DBU=DB_USERNAME=
UPWD=DB_PASSWORD=

PH_RPWD=PUTITHERE_ROOT_DBPWS

PH_DB=PUTITHERE_DBNAME
PH_U=PUTITHERE_USERNAME
PH_UPWD=PUTITHERE_DBPWD

input="../env/.env"

while IFS= read -r line
do
  if [[ "$line" =~ .*"$RPWD".* ]]
  then
     r_pwd="${line//$RPWD/}"
     sed -i -e "s/$PH_RPWD/$r_pwd/g" mysql_secure_installation.sql
  fi

  if [[ "$line" =~ .*"$DB".* ]]
  then
    db_name="${line//$DB/}"
    sed -i -e "s/$PH_DB/$db_name/g" mysql_create_db.sql
  fi

  if [[ "$line" =~ .*"$DBU".* ]]
  then
    db_user="${line//$DBU/}"
    sed -i -e "s/$PH_U/$db_user/g" mysql_create_db.sql
  fi

  if [[ "$line" =~ .*"$UPWD".* ]]
  then
    db_upw="${line//$UPWD/}"
    sed -i -e "s/$PH_UPWD/$db_upw/g" mysql_create_db.sql
  fi
done < "$input"

mysql -sfu root < mysql_secure_installation.sql
mysql -sfu root < mysql_create_db.sql

echo 'DATABASE IS UP!'
