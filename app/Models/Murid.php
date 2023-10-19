<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany,
};

class Murid extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the jenjang that owns the Murid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(Jenjang::class);
    }

    /**
     * Get the user that owns the Murid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the pesanan for the Murid
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}
