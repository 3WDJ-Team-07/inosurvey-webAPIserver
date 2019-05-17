<?php

namespace App\Models\Donations;

use Illuminate\Database\Eloquent\Model;

class CategoryDonation extends Model
{
    public $timestamps = false;
    protected $fillable = ['donation_id','category_id'];
    protected $table = 'category_donation';
}
