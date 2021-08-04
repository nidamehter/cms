<?php

class category extends Model
{
    public function getall()
    {
        $sql="select * from categories";
        $categories=parent::get($sql);
        return $categories;
    }
}

?>