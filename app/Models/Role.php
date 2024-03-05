<?php

namespace App\Models;

use App\Models\User;
use App\Models\UserRole;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'abilities'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'abilities' => 'array',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles')->using(UserRole::Class)->withTimestamps();
    }

    public function hasSlug($roleSlugs)
    {
        foreach ($roleSlugs as $roleSlug) {
            if ($roleSlug == $this->slug) {
                return true;
            }
        }

        return false;
    }
}