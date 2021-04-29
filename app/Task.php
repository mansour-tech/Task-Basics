<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function getRouteKeyName()
    {
        return 'slug';    //هذي علشان خلي صفحة العرض مهمة شو رابطها الاسم لطيف
    }
    protected $fillable = [
        'task', 'slug', 'description','category','user_id',
    ];
    public function user(){
        /*   App\User Model  */
          return $this->belongsTo(User::class);
  
    }
}
