<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // /**
    //  * Get all of the guru for the Matapelajaran
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function guru(): HasMany
    // {
    //     return $this->hasMany(Guru::class);
    // }
}
