<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessTransactionType extends Model
{
    use HasFactory;
    protected $table = 'business_transaction_type';
    protected $fillable = ['business_id','transaction_type_id'];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
