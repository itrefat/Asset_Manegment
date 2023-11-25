<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    use HasFactory;
    protected $fillable = ['model_no', 'product_details', 'product_sl_no','vendor', 'purchase_date', 'challan_no', 'others', 'products_id', 'department_id', 'designation_id'];


    function rel_to_producttypes(){
        return $this->belongsTo(ProductType::class, 'products_id');
    }

    function rel_to_departmet(){
        return $this->belongsTo(Department::class, 'department_id');
    }
    

    function rel_to_designation(){
        return $this->belongsTo(Designation::class, 'designation_id');
    }



}
