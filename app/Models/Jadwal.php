<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany,
};

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the guru that owns the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }

    /**
     * Get the hari that owns the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hari(): BelongsTo
    {
        return $this->belongsTo(Hari::class);
    }

    /**
     * Get the mataPelajaran that owns the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mataPelajaran(): BelongsTo
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    /**
     * Get the jenjang that owns the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(Jenjang::class);
    }

    /**
     * Get all of the pesanan for the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}
