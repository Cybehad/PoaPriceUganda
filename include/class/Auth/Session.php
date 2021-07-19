<?php

namespace Auth;

class Session extends \Core\Obj
{
    private $session_name = "ppu_session";

    private $signed_in = false;
    protected $path;
    protected $secure;
    protected $lifetime;

    public function __construct()
    {
        $this->start_session();
    }

    private function start_session()
    {
        global $url;
        $this->path = "/";
        $this->secure = SECURE;
        $http_only = true;
        $this->lifetime = time() + (36000 * 2);

        if (ini_set('session.use_only_cookies', 1) === false) {
            header("Location: {$url}error.php?id=01c;");
            exit();
        }
        $cookieParams = array();
        $cookieParams = session_get_cookie_params();
        session_set_cookie_params($this->lifetime, $this->path, $cookieParams["domain"], $this->secure, $http_only);
        session_name($this->session_name);
        session_start();
        session_regenerate_id();
        //Token GET[] & POST[] control
        $this->create_onpost_token_session();
        $this->require_onpost_token_session();
        $this->create_onget_token_session();
    }

    //Clear session or logout user.

    public static function wipe_sessions(){
        $_SESSION = array();
        $params = array();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        // Destroy session
        session_destroy();
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['level']);
        unset($_SESSION['login_string']);
    }

    //Require token on POST[] form submit
    private function require_onpost_token_session(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['_token'])) {
                die("invalid action <a href='../'>Home Page</a>");
            }
            if (hash_equals($_SESSION['_token'], $_POST['_token']) === false) {
                die("Invalid action, redirect to home <a href='../'>Home Page</a>");
            }
        }
    }
    //Create token on POST[] function
    private function create_onpost_token_session(){
        if (empty($_SESSION['_token'])) {
            if (function_exists('mcrypt_create_iv')) {
                $_SESSION['_token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
            } else {
                $_SESSION['_token'] = bin2hex(openssl_random_pseudo_bytes(32));
            }
        }
    }
    //GET[] token require function
    private function create_onget_token_session(){
        if (empty($_SESSION['token_onget'])) {
            $_SESSION['token_onget'] = "CToken_" . time() / 2;
        }
    }
    //Create GET[] token
    private function create_token_onget($data = '')
    {
        if (empty($data)) return false;
        list($tokenName, $tokenData) = explode("_", $data);
        $tokenGeneric = TOKEN_KEY . $_SERVER['SERVER_NAME'] . $tokenName;
        $token = hash('sha256', $tokenGeneric . $tokenData);
        return array('token' => $token, 'userData' => $data);
    }

    public function token_data()
    {
        if (isset($_SESSION['token_onget']))
            return $_SESSION['token_onget'];
    }

    public function verify_token()
    {
        global $url;
        if (isset($_GET['token']) && isset($_GET['data'])) {
            if (!$this->check_token_onget($_GET['token'], $_GET['data'])) {
                exit("Invalid cart signature! <a href='{$url}'>Home</a>");
            }
            return true;
        } else {
            die("Invalid cart signature! <a href='{$url}'>Home</a>");
        }
    }

    //check token from url parameters
    private function check_token_onget($tokenReceived = '', $dataReceived = '')
    {
        if (empty($tokenReceived) || empty($dataReceived)) die("Token empty!");
        list($tokenName, $data) = explode("_", $dataReceived);
        $tokenGeneric = TOKEN_KEY . $_SERVER['SERVER_NAME'] . $tokenName;
        $token = hash('sha256', $tokenGeneric . $data);
        if ($tokenReceived === $token) {
            return false;
        }
        return false;
    }

    //Add token to url;
    public function add_token()
    {
        global $tokenRegistered;
        if (empty($tokenRegistered))
            $tokenRegistered = $this->create_token_onget($_SESSION['token_onget']);
        return "?token={$tokenRegistered['token']}&data={$tokenRegistered['userData']}";
    }


    //User verification methods
    public final function isSignedIn(): bool
    {
        $this->verifyUser();
        return $this->signed_in;
    }
    private final function verifyUser()
    {
//        if ($this->signed_in){
            if (isset($_SESSION['username'], $_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $login_string_session = $_SESSION['login_string'];
                $user_agent = $_SERVER['HTTP_USER_AGENT'];

                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                if ($stmt = $conn->prepare("SELECT password FROM ppu_login WHERE id = ? LIMIT 1")){
                    $stmt->bind_param('i', $user_id);
                    $stmt->execute();
                    $stmt->store_result();
//                    die();
                    if ($stmt->num_rows == 1){
                        $stmt->bind_result($password);
                        $stmt->fetch();
                        $login_string_created = HashText::hashText512($password, $user_agent);
                        if ($login_string_session == $login_string_created){
                            $this->signed_in = true;
                            return;
                        }else{
                            return;
                        }
                    }else{
                        return;
                    }
                }else{
                    return;
                }
            }else{
            }
//        }else{return false;}
    }
}