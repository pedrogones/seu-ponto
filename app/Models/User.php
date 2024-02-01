<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasRole;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * hasMany
     */

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function setPasswordAttribute($value)
    {
        if (!empty($value) && !is_null($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
    public function photoProfile(): Attribute
    {
        return new Attribute(
            get: function (): string {
                $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
                    return mb_substr($segment, 0, 1);
                })->join(''));

                return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&color=ffffff&size=200&rounded=true&bold=true&format=svg&length=1&uppercase=true';
            }
        );
    }

    public function role(): Attribute
    {
        return new Attribute(
            get: function () {
                // Verifica se a relação 'roles' existe e não está vazia
                if ($this->roles && !$this->roles->isEmpty()) {
                    return $this->roles->first()->name;
                }

                // Se a relação 'roles' não existe ou está vazia, retorne um valor padrão ou lide com isso conforme necessário
                return 'Sem papel atribuído'; // ou qualquer valor padrão desejado
            }
        );
    }

}
