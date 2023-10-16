<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collective extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'lawyer_id',
        'subject',
        'jurisdiction',
        'cause_value',
        'justice_secret',
        'free_justice',
        'tutelary',
        'priority',
        'judgmental_organ',
        'judicial_office',
        'competence',
        'url_collective',
        'url_notices',
        'email_coorporative',
        'email_client',
        'qtd_update',
        'qtd_finish',
        'progress',
        'finish',
        'update',
    ];
}
