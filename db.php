<?php

class billerDB extends SQLite3{
    function __construct()
    {
        $this->open('database/biller.db');
    }
}

?>
