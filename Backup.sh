#!/bin/bash


DATADIR=”/home/ubuntu/mysqlbackup”
USERNAME=root
PASSWORD=Crystalzxcxx12
NOW=$(date +”%d-%m-%Y_%H-%M”)

mysqldump -u $USERNAME $PASSWORD -p --all-databases > /home/ubuntu/Backups/MySQLDatabase.$NOW.sql


find /home/ubuntu/Backups/* -mmin +35 -exec rm {} \;


2>&1 > /var/log/mysqldump.log; echo "Exit code: $?" >> /var/log/mysqldump.log

