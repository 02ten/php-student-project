<?php

class Model
{
    public function get_data()
    {
    }
    public function get_connection()
    {
        return new mysqli("db", "user", "password", "appDB");

    }

}

?>