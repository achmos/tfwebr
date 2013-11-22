<?php
class transformerDB extends mysqli {
    private static $instance = null;

    // db connection config vars
    // left these blank for committing to github
    private $user = "rtawakul_tfadmin";
    private $pass = "gunpass12";
    private $dbName = "rtawakul_tflist";
    private $dbHost = "localhost";
    
    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function __clone() {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup() {
        trigger_error('Deserializing is not allowed.', E_USER_ERROR);
    }

    // private constructor
    private function __construct() {
        parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }
        parent::set_charset('utf-8');
    }
    
    public function verifyUser($usr, $pwd) {
        $usr = $this->real_escape_string($usr);
        
        $pwd = $this->real_escape_string($pwd);
        $password = md5($password);
        
        $result = $this->query("SELECT 1 FROM users WHERE username='" . $usr . "' AND password='" . $password .  "'");
        return $result->data_seek(0);
        
    }
    
    public function getToylines() {
        $result = $this->query("SELECT * FROM 'toyline'");
        return $result;
    }
    
    public function addToyline ($newLine) {
        $newLine = $this->real_escape_string($newLine);
        
        $this->query("INSERT INTO `toyline`( `lineName`) VALUES ('" . $newLine . "')");
    }
    
    public function getClassNames() {
        $result = $this->query("SELECT * FROM 'class'");
        return $result;
    }
    
    public function addClassSize($newSize) {
        $newSize = $this->real_escape_string($newSize);
        
        $this->query("INSERT INTO `class`( `className`) VALUES ('" . $newSize . "')");
    }
    
    public function addTransformer($name, $line, $class) {
        
    }
    
    public function changeListStatus($tfID) {
        
    }
    
    public function deleteTransformer($tfID) {
        
    }
    
    public function editTransformer($tfID) {
        
    }
}

?>
