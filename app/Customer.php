<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // variables in the fillable array can be mass assigned
    // protected $fillable = ["name", 'title', "email", "active"];

    //variables in the guarded array cannot be mass assigned, opp of fillable
    protected $guarded = [];

    public function getActiveAttribute($attribute) {
        return [
            0 => 'Inactive',
            1 => 'Active'
        ][$attribute];
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
