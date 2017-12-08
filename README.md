# joomla-docker

## Setup
Run the following command `docker-compose up -d` Add `--build` to rebuild the image

Browse `http://localhost:8080`

Follow the instructions to setup Joomal and enter the following details for the database:

Host Name `yoti_joomladb`

Username `root`

Password `root`

Database Name `yotijoomla`

## Register Yoti plugin
After doing Joomla set, run the command below to process the SQL dump script which will register Yoti plugin

`docker exec -i joomladocker_yoti_joomladb_1 mysql -uroot -proot yotijoomla < ./docker/db-dump/mysql-dump.sql`
