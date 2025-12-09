<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'type_document_id',
    'document',
    'address',
    'phone',
    'email'
];


    public function type_document(){
        return $this->belongsTo(TypeDocument::class);
    }
}
