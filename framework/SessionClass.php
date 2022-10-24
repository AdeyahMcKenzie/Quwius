<?php


class SessionClass{

    private $sess;
    private $access = ['profile' => ['tester@comp3170.com','adeyahmckenzie@uwi.com']];

    public function create(): void {
        session_start();
    }

    public function destroy(): bool{
        
        session_unset();
        session_destroy();
        setcookie("user", "", time() - 3600);
    }

    public function add($name, $value){
        $_SESSION[$name] = $value;
        setcookie($name,$value,time()+(87000*30), '/'); 
        
    }

    public function remove($name){
        session_unset($_SESSION[$name]);
    }

    public function accessible($user,$page): bool{
        if(in_array($user,$this -> access[$page])){
            return true;
        }
        
        return false;
    }
}
