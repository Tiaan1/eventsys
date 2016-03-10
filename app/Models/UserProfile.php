<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $fillable = ['user_id','bio','location','twitter_username','facebook_username','github_username'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
