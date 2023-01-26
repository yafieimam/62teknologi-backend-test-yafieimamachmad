<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategories extends Model
{
    use HasFactory;
    protected $table = 'business_categories';
    protected $fillable = ['business_id','categories_id'];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
