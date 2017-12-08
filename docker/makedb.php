<?php
// Args: 0 => makedb.php, 1 => "$JOOMLA_DB_HOST", 2 => "$JOOMLA_DB_USER", 3 => "$JOOMLA_DB_PASSWORD", 4 => "$JOOMLA_DB_NAME"
$stderr = fopen('php://stderr', 'w');
fwrite($stderr, "\nEnsuring Joomla database is present\n");
if (strpos($argv[1], ':') !== false)
{
	list($host, $port) = explode(':', $argv[1], 2);
}
else
{
	$host = $argv[1];
	$port = 3306;
}
$maxTries = 10;
do
{
	$mysql = new mysqli($host, $argv[2], $argv[3], '', (int) $port);
	if ($mysql->connect_error)
	{
		fwrite($stderr, "\nMySQL Connection Error: ({$mysql->connect_errno}) {$mysql->connect_error}\n");
		--$maxTries;
		if ($maxTries <= 0)
		{
			exit(1);
		}
		sleep(3);
	}
}
while ($mysql->connect_error);
if (!$mysql->query('CREATE DATABASE IF NOT EXISTS `' . $mysql->real_escape_string($argv[4]) . '`'))
{
	fwrite($stderr, "\nMySQL 'CREATE DATABASE' Error: " . $mysql->error . "\n");
	$mysql->close();
	exit(1);
}

/*sleep(3);

$createYotiUsers = "CREATE TABLE IF NOT EXISTS `yotijoomla.yoti_yoti_users` (
  `joomla_userid` int(15) NOT NULL,
  `identifier` text NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`joomla_userid`)
)";

if (!$mysql->query($createYotiUsers))
{
        fwrite($stderr, "\nMySQL 'CREATE TABLE yoti_yoti_users' Error: " . $mysql->error . "\n");
        $mysql->close();
        exit(1);
}*/

fwrite($stderr, "\nMySQL Database Created\n");
$mysql->close();	
