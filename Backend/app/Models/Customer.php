<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
<<<<<<< HEAD
=======
    protected $table = 'customers';
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
    use HasFactory;

    protected $fillable = ['first_name', 'last_name','tel','gender','dob'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
