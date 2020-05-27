<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offender extends Model
{

    protected $fillable =
        [
            'doc_no',
            'name',
            'gender',
            'citizenship',
            'race',
            'age_variance',
            'dob',
            'marital_status',
            'hair_color',
            'eye_color',
            'height',
            'weight',
            'religion',
            'education',
            'residence',
            'cluster',
            'special_need',
            'special_need_category',
            'special_need_details',
        ];
}
