<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'membership_no',
        'nric',
        'name',
        'gender',
        'address',
        'postcode',
        'city',
        'state',
        'phone',
        'division_id',
    ];

    public function division()
    {
      return $this->belongsTo(Division::class);
    }

    public function groups(){
      return $this->belongsToMany(Group::class);
    }
}
