<?php
    // session start
    session_start();
    
    // Put session
    function PutSession(string $session_name, mixed $session_value) : void {
        try {
            $_SESSION[$session_name] = $session_value;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    // put sessions with array form
    function PutSesssionArray(array $sessions) : void {
        try {
            if(empty($sessions)){
                throw new Exception('Don\'t out empty array for session making! ', 1);
                
            }
            foreach($sessions as $key => $val){
                $_SESSION[$key] = $val;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // check if there was a specific session exist 
    function SessionHas(string $session_name) : bool {
        try {
            if(!isset($_SESSION[$session_name])){
                return false;
            }
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // get session value
    function Session(string $session_name) : mixed {
        try {
            return $_SESSION[$session_name];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
?>