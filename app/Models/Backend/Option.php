<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $table='options';
    protected $fillable = ['title','status','created_by','updated_by'];
    protected $filltable=['title','status','created_by','updated_by'];
}
