<?php
require_once("config/config.php");

class Database{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;
    private $dbname = DB_NAME;


    private $connection;
    private $error;
    private $stmt;
    private $dbconnected = false;


    function __construct()
    {
        //Set PDO Connection
        $dsn = 'mysql:host=' .$this->host . ';dbname=' .$this->dbname;
        $option = array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

                 );

        try{
            $this->connection = new PDO($dsn, $this->user, $this->pass, $option);
            $this->dbconnected = true;
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            $this->dbconnected = false;
        }
    }

    function getError(){
        return $this->error;

    }

    function isConnected(){
        return $this->dbconnected;

    }

    //prepare statement with query
    function query($query){
        $this->stmt = $this->connection->prepare($query);

    }
    //exeute prepared statement
    function execute(){
        return $this->stmt->execute();
    }

    //get result set as Array of Objject

    function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Get Record Row Count
    function rowCount(){
        return $this->stmt->rowCount();
    }

    //get single record as object
    function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    function fetch(){
        $this->execute();
        return $this->stmt->fetch();
    }

    function fetchColumn(){
        $this->execute();
        return $this->stmt->fetchColumn();
    }

    function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;  
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;  
                default:
                    $type = PDO::PARAM_STR;
        }
        }

        $this->stmt->bindValue($param, $value, $type);
    }
}



//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;

$host = $cleardb_server;
$username = $cleardb_username;
$password = $cleardb_password;
$db = $cleardb_db;
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


?>