<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{



    public  function contact_numbers()
    {
        return $this->hasMany(ContactNumber::class);

    }


}
