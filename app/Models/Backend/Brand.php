<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $fillable = ['title','slug','status','rank','created_by','updated_by'];
    protected $filltable=['title','slug','status','rank','created_by','updated_by'];
}