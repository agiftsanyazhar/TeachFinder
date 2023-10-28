<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany,
};

class Guru extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the lokasi that owns the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokasi(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class);
    }

    /**
     * Get the user that owns the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the alamatGuru for the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alamatGuru(): HasMany
    {
        return $this->hasMany(AlamatGuru::class);
    }

    /**
     * Get all of the jadwal for the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }

    /**
     * Get all of the pesanan for the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }

    public function setImageAttribute($value)
    {
        $attributeName = 'skl_ijazah';
        $defaultPath = public_path('uploads');
        $destinationPath = $defaultPath . '/gurus/skl_ijazah';

        if (!file_exists($defaultPath)) {
            mkdir($defaultPath, 0777, true);
        }

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        if ($value) {
            $image_name = time() . '.' . $value->getClientOriginalExtension();
            $value->move($destinationPath, $image_name);
            $this->attributes[$attributeName] = $destinationPath . '/' . $image_name;
        }
    }
}
