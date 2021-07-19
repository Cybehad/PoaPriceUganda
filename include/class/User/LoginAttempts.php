<?php


namespace User;


class LoginAttempts extends Login
{
    protected static $db_table = "ppu_login_attempt";
    protected static $db_table_fields = array('user_id', 'attempt_time');

    public $user_id;
    public $attempt_time;

    public final static function checkbrute($user_id) {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // Get timestamp of current time
        $now = time();
        // All login attempts are counted from the past 2 hours.
        $valid_attempts = $now - (2 * 60 * 60);
        $sql = "SELECT attempt_time FROM ".self::$db_table." WHERE user_id = ? AND attempt_time > '$valid_attempts'";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('i', $user_id);
            // Execute the prepared query.
            $stmt->execute();
            $stmt->store_result();
            // If there have been more than 5 failed logins
            if ($stmt->num_rows > 5) {
                return true;
            } else {
                return false;
            }
        } else {
            // Could not create a prepared statement
            header("Location: ../error.php?err=Database error: cannot prepare statement");
            exit();
        }
    }
}