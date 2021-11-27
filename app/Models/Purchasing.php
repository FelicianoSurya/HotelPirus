<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasing extends Model
{
    use HasFactory;
    
    protected $table = 'purchasing';
    protected $fillable = [
        'supplierID',
        'inventoryID',
        'qtyPurchased',
        'price',
        'status',
        'orderDate',
        'createdBy',
        'updatedBy'
    ];

    public function createdBy(){
        return $this->belongsTo(User::class , 'createdBy' , 'id');
    }
    
    public function updatedBy(){
        return $this->belongsTo(User::class , 'updatedBy' , 'id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplierID', 'id');
    }

    public function inventory(){
        return $this->belongsTo(Inventory::class, 'inventoryID', 'id');
    }


}
