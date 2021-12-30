<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    /**
     * Get the district that owns the division.
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
