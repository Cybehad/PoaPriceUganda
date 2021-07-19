<?php


namespace User;


use Auth\HashText;

class Login extends \Core\Obj
{
    protected static $db_table = "ppu_login";
    protected static $db_table_fields = array('username', 'email', 'password', 'agreed', 'salt');

    protected $id;
    public $username;
    public $email;
    public $password;
    protected $active;
    public $access_level;
    public $agreed;
    public $deleted;
    public $salt;
    public $create_date;

    public function __construct()
    {
    }
    public function userLogin($username='', $password=''){
        if (empty($username) || empty($password)) return false;
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM ".self::$db_table. " WHERE username = '{$username}' LIMIT 1";
        $result = self::find_by_query($sql);
        if (empty($result))  return false;
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql_2 = "SELECT id, password, access_level, deleted, salt FROM ".self::$db_table." WHERE username = ? LIMIT 1";
        $stmt =$conn->prepare($sql_2);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        //set variables
        $stmt->bind_result($this->id, $this->password, $this->access_level, $this->deleted, $this->salt);
        $stmt->fetch();
        if ($stmt->num_rows == 1){
            $this->username = $username;
            $HashPassword = HashText::hashText($password, $this->salt);
            //If user found.
            // If the user exists we check if the account is locked
            // from too many login attempts
            if (LoginAttempts::checkbrute($this->id)) {
                // Account is locked
                //todo;
                Notify::msg("Account locked for two hours due to too many login attempts! ");
                // Send an email to user saying their account is locked
                //todo;
                return false;
            } else {
                if ($HashPassword === $this->password) {
                    //XSS prevention
                    $id = preg_replace("/[^0-9]+/", "", $this->id);
                    $user_agent = $_SERVER['HTTP_USER_AGENT'];
                    //Register Session
                    $_SESSION['login_string'] = HashText::hashText512($user_agent, $HashPassword);
                    $_SESSION['user_id'] = $id;
                    $_SESSION['username'] = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $this->username);
                    $_SESSION['access_leve'] = $this->access_level;
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                    $ip_address2 = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    Log::create_log($id, $ip_address, $ip_address2, $user_agent);
                    return array_shift($result);
                } else {
                    //Password not matching
                    $now = time();
                    if (!$database->query("INSERT INTO ppu_login_attempt (user_id, attempt_time) VALUES ('{$this->id}', '{$now}')")) {
                        Notify::msg_redirect("Database error: login attempts");
                    }
                    return false;
                }
            }
        }else{return false;}
        $stmt->close();
        $conn->close();
    }

    public static function checkUsername($username){
        global $full_url;
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $prep_stmt = "SELECT id FROM ".self::$db_table." WHERE username = ? LIMIT 1";
        $stmt = $conn->prepare($prep_stmt);
        if ($stmt) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                return true;
            }
        } else {
            return false;
        }
    }
}