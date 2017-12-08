# joomla-docker

## Setup
Run the following commands:

`cd joomla-docker`

`docker-compose up -d` and add `--build` at the end if you want to rebuild the image.

Browse `http://localhost:8080`

Follow the instructions to setup Joomla and enter the database details as described in the next section.

## Database Configuration

Host Name `yoti_joomladb`

Username `root`

Password `root`

Database Name `yotijoomla`

Table Prefix  `yoti_`

## Register Yoti plugin
After doing Joomla set up, run the command below to process the SQL dump script which will register Yoti plugin

`docker exec -i joomladocker_yoti_joomladb_1 mysql -uroot -proot yotijoomla < ./docker/db-dump/mysql-dump.sql`

## Yoti plugin setup
Please make sure you enable Yoti module and Yoti plugin from Joomla admin in http://yoursite.com/administrator.

And follow the instructions [here](https://github.com/getyoti/yoti-joomla) to set Yoti up.
