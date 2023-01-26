<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business';
    protected $fillable = ['alias','name','image_url','is_closed','url','review_count','rating','price','phone','display_phone','distance'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function coordinates()
    {
        return $this->belongsTo(Coordinates::class);
    }

    public function transaction()
    {
        return $this->belongsTo(TransactionType::class);
    }
}
