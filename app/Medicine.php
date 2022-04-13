<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
   public function category()
   {
      return $this->belongsTo('App\Category', 'category_id');
   }

   public function transcations()
   {
      return $this->belongsToMany('App\Transaction', 'medicine_transaction', 'transaction_id', 'medicine_id')
         ->withPivot('quantity', 'price');
   }
}