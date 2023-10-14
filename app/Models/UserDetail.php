<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'default_language',
        'address_line_one',
        'address_line_two',
        'town_city',
        'zip_postcode',
        'state_county',
        'country',
        'landline_number',
        'mobile_number',
        'website',
        'default_payment_method',
        'description',
        'lead_status',
        'lead_source',
        'lead_assignee_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
