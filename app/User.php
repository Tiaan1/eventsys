<?php

namespace App;

use App\Models\UserProfile;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable implements SluggableInterface
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use Messagable;
    use SluggableTrait;
    protected $fillable = ['full_name', 'email', 'password',];
    protected $sluggable = ['build_from' => 'full_name', 'save_to' => 'slug',];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

}
