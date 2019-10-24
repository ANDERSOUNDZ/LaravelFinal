<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'movements';
    protected $fillable = [
        'type',
        'movement_date',
        'category_id',
        'description',
        'money'
    ];

    protected $dates = ['movement_date'];

    public function getMoneyDecimalAttribute(){
        return $this->attributes['money']/100;
    }

     public function user(){
        $this->belongTo(User::class);
    }
}
