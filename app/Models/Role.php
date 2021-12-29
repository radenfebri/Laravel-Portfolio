<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['name', 'guard_name'];

    protected $hidden = [];

}
