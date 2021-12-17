<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'categoryCode',
        'categoryName',
        'createdBy',
        'updatedBy'
    ];

    public function createdBy(){
        return $this->belongsTo(User::class , 'createdBy' , 'id');
    }
    
    public function updatedBy(){
        return $this->belongsTo(User::class , 'updatedBy' , 'id');
    }
}
