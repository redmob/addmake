<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckValuation extends Model
{
    use HasFactory;

    public function company()
    {

    return $this->belongsTo(Company::class, 'company_id');
    }


    public function make()
    {

    return $this->belongsTo(Make::class, 'make_id');
    }

    public function modal()
    {

    return $this->belongsTo(Modal::class, 'modal_id');
    }


   public function body()
    {

    return $this->belongsTo(Body::class, 'body_id');
    }


    public function year()
    {

    return $this->belongsTo(Year::class, 'year_id');
    }


}
