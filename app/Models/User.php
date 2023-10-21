<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany,
    HasOne,
};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the role that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get all of the murid for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function murid(): HasOne
    {
        return $this->hasOne(Murid::class);
    }

    /**
     * Get all of the guru for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guru(): HasOne
    {
        return $this->hasOne(Guru::class);
    }

    /**
     * Get all of the testimonialPengirim for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonialPengirim(): HasMany
    {
        return $this->hasMany(Testimonial::class, 'pengirim_id', 'id');
    }

    /**
     * Get all of the testimonialPenerima for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonialPenerima(): HasMany
    {
        return $this->hasMany(Testimonial::class, 'penerima_id', 'id');
    }

    public function setImageAttribute($value)
    {
        $attributeName = 'image';
        $defaultPath = public_path('uploads');
        $destinationPath = public_path('uploads/users');

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
