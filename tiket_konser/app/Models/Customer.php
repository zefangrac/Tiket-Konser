<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function getCustomer($slug = false)
    {
        if (!$slug) return $this->all();
        return $this->where('slug', '=', $slug)->first();
    }
}
