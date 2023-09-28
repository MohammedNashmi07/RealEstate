<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function agent(){
        return $this->belongsTo(User::class,'agent_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function image(){
        return $this->hasMany(PropertyImage::class,'property_id');
    }

}
