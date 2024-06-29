<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = [
        'document_name',
        'description',
        'type',
        'path',
        'extension',
        'mimetype',
        'active'
    ];
}
