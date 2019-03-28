<?php

namespace App\Models\Donations;

use Illuminate\Database\Eloquent\Model;

class DonationUser extends Model
{
    
    public $timestamps = false;
    protected $table = 'donation_user';
    protected $fillable = [

        'donation_id',
        'Sponsors_id',
    
    ];

}
