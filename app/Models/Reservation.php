<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'party_size',
        'reservation_date',
        'reservation_time',
        'special_requests',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'reservation_date' => 'date:Y-m-d',
            'reservation_time' => 'string',
            'party_size' => 'integer',
        ];
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}
