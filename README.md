# joomla-docker

## Setup
Clone this repos and run the following commands:

`cd joomla-docker`

`docker-compose build` If you want to rebuild the image

`docker-compose up -d` to build the containers.

Browse the link below and follow the instructions

`http://localhost:8080`

## Database Configuration
Enter the following details for the database

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

## Removing docker containers
Run the following commands to remove docker containers:

`docker-compose stop` and

`docker-compose rm`
