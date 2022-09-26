<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $primaryKey = 'blog_id';
    public $timestamps = false;
    protected $table ='blog';
    protected $fillable = [
        'title',
        'content'
        
    ];
}
