<?php

namespace App\Repository;

abstract class BaseRepository
{

    protected static $model;

    public function insert($data)
    {
        return static::$model::insert($data);
    }

    public function find($id)
    {
        return static::$model::find($id);
    }

    public function findAll()
    {
        return static::$model::all();
    }

    public function update($data,$id)
    {
        return static::$model::where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return static::$model::where('id',$id)->delete();
    }

}