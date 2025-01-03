<?php
class Database{

private $pdo;
private $host='localhost';
private $dbname='videogame';
private $dbuser='root';
private $dbpwd='';
public function connect(){
    try{
$this->pdo=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->dbuser,$this->dbpwd);
$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
return $this->pdo;


}
    catch(PDOException $e){

        echo 'Connection failed'.$e->getMessage();
    }
}
public function close() {
    $this->pdo = null;
}

}