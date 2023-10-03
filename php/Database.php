<?php
declare(strict_types=1);

/**
 * DB class
 */
final class Database
{
/**
 * @var string
 */
private string $dbuser;
/**
 * @var string
 */
private string $dbpassword;
/**
 * @var string
 */
private string $dbname;
/**
 * @var string
 */
private string $dbhost;
	/**
	 * @param string $dbuser
	 * @param string $dbpassword
	 * @param string $dbname
	 * @param string $dbhost
	 */
	public function __construct( string $dbuser, string $dbpassword, string $dbname, string $dbhost )
	{
		$this->dbuser = $dbuser;
		$this->dbpassword = $dbpassword;
		$this->dbname = $dbname;
		$this->dbhost = $dbhost;
	}
/**
 * @return object
 */
public function db_connect(): object|false
{
	$dbConnect = pg_connect("host=$this->dbhost dbname=$this->dbname user=$this->dbuser password=$this->dbpassword");	
	if ($dbConnect=== false) {
	exit();
} else {
return $dbConnect;
}	
}

/**
 * @param object $dbconn
 * @param string $email
 * 
 * @return void
 */
public function db_insert(object $dbconn, string $email): void
{
$outcome = pg_prepare($dbconn, "new_query", 'INSERT INTO feedback (email) VALUES ($1)');
$outcome = pg_execute($dbconn, "new_query", array($email));	
}
}
?>