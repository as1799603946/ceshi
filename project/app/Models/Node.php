<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
     //与模型关联的数据表
    protected $table = 'nodes';

    //改模型是否被自动维护时间戳
    public $timestamps = false;
    //可以被批量赋值的属性
    protected $fillable = ['cname','aname','desc','status'];
}
