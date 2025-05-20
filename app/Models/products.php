<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = ['name'];
    protected $table = 'products';
    
    public function categories(){
        
        return $this->belongsTo('Categories','pro_cat');
    }
}
