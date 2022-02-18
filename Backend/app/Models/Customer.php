<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    use HasFactory;

    protected $fillable = ['first_name', 'last_name','tel','gender','dob'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
