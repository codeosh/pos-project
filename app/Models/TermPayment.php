<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermPayment extends Model
{
    use HasFactory;

    protected $table = "tbl_payments";

    protected $fillable = [
        'contact_id',
        'type',
        'day',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}
