<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'content';
    protected $primaryKey = 'idcont';
    public $timestamps = false;
    protected $fillable = ['title', 'summary', 'description'];
}
