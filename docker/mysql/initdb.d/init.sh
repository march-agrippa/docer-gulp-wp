#!/usr/bin/env bash
#wait for the MySQL Server to come up
#sleep 90s

#run the setup script to create the DB and the schema in the DB
mysql -u user -ppass wordpress < "/docker-entrypoint-initdb.d/001-create-moshi-tables.sql"
mysql -u user -ppass wordpress < "/docker-entrypoint-initdb.d/002-create-koshu-tables.sql"
mysql -u user -ppass wordpress < "/docker-entrypoint-initdb.d/003-create-ipersonal-tables.sql"
mysql -u user -ppass wordpress < "/docker-entrypoint-initdb.d/004-create-event-tables.sql"
mysql -u user -ppass wordpress < "/docker-entrypoint-initdb.d/005-create-apply-tables.sql"
mysql -u user -ppass wordpress < "/docker-entrypoint-initdb.d/006-create-request-tables.sql"
mysql -u user -ppass wordpress < "/docker-entrypoint-initdb.d/007-create-token-tables.sql"