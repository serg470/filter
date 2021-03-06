#!/bin/bash
#DB Info
user=serg
password=n95ow4
database=rkn
host=mysql

#Get and prepair blocked IPs and domains
wget -P /home/zapret/ https://github.com/zapret-info/z-i/archive/master.zip
unzip /home/zapret/master.zip -d /home/zapret/
mv /home/zapret/z-i-master/* /home/zapret/
rm -r /home/zapret/z-i-master
rm /home/zapret/master.zip
if [ -f "/home/zapret/column" ]; then
    rm /home/zapret/column
fi
umask 777
grep -o '[0-9]\{1,3\}\.[0-9]\{1,3\}\.[0-9]\{1,3\}\.[0-9]\{1,3\}' /home/zapret/dump.csv | sort -u -k1,1 > /home/zapret/column

#sleep 30m

#Insert all to MySQL database
mysql --host="$host" --user="$user" --password="$password" --database="$database" --execute="TRUNCATE TABLE ip_addresses"
mysql --host="$host" --user="$user" --password="$password" --database="$database" --execute="TRUNCATE TABLE domain"
mysql --host="$host" --user="$user" --password="$password" --database="$database" --execute="LOAD DATA LOCAL INFILE '/home/zapret/column' INTO TABLE $database.ip_addresses (@ip) SET ip=INET_ATON(@ip);"
mysql --host="$host" --user="$user" --password="$password" --database="$database" --execute="LOAD DATA LOCAL INFILE '/home/zapret/nxdomain.txt' INTO TABLE $database.domain;"
