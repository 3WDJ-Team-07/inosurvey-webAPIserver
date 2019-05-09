<?php

namespace App\Models\Donations;

use Illuminate\Database\Eloquent\Model;

class DonationUser extends Model
{
  
    protected $table = 'donation_user';
    protected $fillable = [

        'donation_id',
        'sponsors_id',
        'donation_amount',
        
    ];

}
