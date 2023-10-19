<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jenjang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the murid for the Jenjang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function murid(): HasMany
    {
        return $this->hasMany(Murid::class);
    }
}
