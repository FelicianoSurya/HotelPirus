<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = [
        'supplierCode',
        'supplierName',
        'address',
        'phoneNumber',
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
