<?php

namespace Mezbilisim\VisitorInfo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip', 'country', 'city', 'url', 'referer'
    ];
}
