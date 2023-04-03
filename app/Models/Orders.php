<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public function scopeFilter($query, array $filters)
    {

        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')->orWhere('title', 'like', '%' . request('search') . '%')->orWhere('price', 'like', '%' . request('search') . '%')->orWhere('payment_status', 'like', '%' . request('search') . '%')->orWhere('delivery_status', 'like', '%' . request('search') . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
