<?php

class SessionEase {
    public function email() { return (isset($_SESSION['email']) ? $_SESSION['email'] : ''); }
    public function msg() { return (isset($_SESSION['message']) ? $_SESSION['message'] : ''); }
    public function name() { return (isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'гість'); }
    public function surname() { return (isset($_SESSION['last_name']) ? $_SESSION['last_name'] : ''); }
    public function fullname() { return ($this->name().' '.$this->surname()); }
    public function loggedIn() { return (isset($_SESSION['logged_in']) && $_SESSION['logged_in']); }
    public function valid() { return (isset($_SESSION['active']) && isset($_SESSION['logged_in']) && $_SESSION['active'] == 1 && $_SESSION['logged_in']); }
    public function clean() 
    { 
        unset($_SESSION['email']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['logged_in']);
        unset($_SESSION['active']);
    }
};

$s = new SessionEase();
if(!($s->loggedIn())) { $s->clean(); }
?>