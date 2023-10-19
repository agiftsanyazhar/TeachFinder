<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the pengirim that owns the Testimonial
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengirim(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pengirim_id', 'id');
    }

    /**
     * Get the penerima that owns the Testimonial
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penerima(): BelongsTo
    {
        return $this->belongsTo(User::class, 'penerima_id', 'id');
    }
}
