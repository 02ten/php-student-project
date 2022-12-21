<?php
class Model_Shop extends Model
{
    public function get_data()
    {
        $mysqli = Model::get_connection();
        return $mysqli->query("SELECT * FROM product");
    }
}
?>