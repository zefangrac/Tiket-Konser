<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = [
        'customerId',
        'location',
        'date',
        'isAlreadyCheckIn'
    ];
    public function getTicket($slug = false)
    {
        if (!$slug) return $this->all();
        return $this->where('slug', '=', $slug)->first();
    }
}
