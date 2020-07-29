<?php

namespace source\Models;
class Model
{

    public function find($id)
    {
        return 1;
    }
    public function all()
    {
        return [1,1,1];
    }
    public function insert($data)
    {
        return $data;
    }
    public function insertOrUpdate($data)
    {
        return $data;
    }
    public function update($id, $data)
    {
        return $data;
    }
    public function delete($id)
    {
        return true;
    }
    public function query($query)
    {
        return true;
    }
}