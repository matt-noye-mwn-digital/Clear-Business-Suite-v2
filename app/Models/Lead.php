<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_status',
        'lead_source',
        'lead_assignee_id',
        'first_name',
        'last_name',
        'company_name',
        'email',
        'landline_number',
        'mobile_number',
        'website',
        'address_line_one',
        'address_line_two',
        'town_city',
        'state_county',
        'zip_postcode',
        'country',
        'lead_value',
        'description',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
