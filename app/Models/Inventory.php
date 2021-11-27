<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Inventory extends Model
{
    use HasFactory;
    
    protected $table = 'inventory';
    protected $fillable = [
        'inventoryCode',
        'inventoryName',
        'stock',
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
