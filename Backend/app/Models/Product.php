<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

<<<<<<< HEAD

=======
    protected $fillable = ['name', 'description','price','image_path','category_id'];
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
}
