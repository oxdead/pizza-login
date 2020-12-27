<?php

class SessionEase {
    public function email() { return (isset($_SESSION['email']) ? $_SESSION['email'] : ''); }
    public function msg() { return (isset($_SESSION['message']) ? $_SESSION['message'] : ''); }
    public function name() { return (isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'гість'); }
    public function fullname() { return (isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) ? ($_SESSION['first_name'].' '.$_SESSION['last_name']) : ''; }
    public function valid() { return (isset($_SESSION['active']) && isset($_SESSION['logged_in']) && $_SESSION['active'] == 1 && $_SESSION['logged_in']); }
};


?>