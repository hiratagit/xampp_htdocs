<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactform extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public function genderBelong() {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    public function getGenderName() {
        return $this->genderBelong->gender_name;
    }
}
