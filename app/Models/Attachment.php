<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'process_id',
        'user_id',
        'type_process',
        'path',
        'type',
        'size'
    ];
}
