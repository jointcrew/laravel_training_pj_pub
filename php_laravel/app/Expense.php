<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function train()
    {
      return $this->belongsTo('App\Train');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
