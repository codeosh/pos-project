<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = "tbl_contacts";

    protected $fillable = [
        'unitcode',
        'customername',
        'contactperson',
        'group',
        'tin',
        'address',
        'contact',
        'comment',
    ];

    public function payment()
    {
        return $this->hasOne(TermPayment::class, 'contact_id');
    }
}
