<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    protected $fillable = [
        'code',
        'name',
        'address',
        'postcode',
        'city',
        'state',
    ];

    protected $appends=[
      'state_name',
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function getStateNameAttribute(){
      return Common::$states[$this->state];
    }
}
