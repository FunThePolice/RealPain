<?php 

require __DIR__.'/config.php';
class Database {

    protected $db;

    public function __construct($host = '127.0.0.1',$user = 'root',$password = '', $db ='local1',$port = 33006,$charset = 'utf8mb4')
    {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $this->db = new mysqli($host, $user, $password, $db, $port);
    $this->db->set_charset($charset);
    $this->db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    }

    public function all($table)
    {
        $stmt = $this->db->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }

    public function getUser($name,$password,$email) 
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE name = ? AND password = ? AND email = ?");
        $stmt->bind_param("sss", $name , $password , $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }

    public function addUser($name,$password,$email)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name,password,email) VALUES (?,?,?)");
        $stmt->bind_param("sss", $name, $password, $email);
        $stmt->execute();
    }

}

class dbConnect extends Database { 

    public function dbCheck($db)
    {
        if(!$db){
            echo "net connect";
        } else {
            echo "yes connect";
        }
    }
}
