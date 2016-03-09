<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
class Speaker extends Model implements SluggableInterface
{
    use SluggableTrait;
    protected $table = 'speakers';
    protected $fillable = ['full_name','slug','organisation','job_title','bio','thumbnail','contact_number', 'website', 'email'];
    protected $sluggable = ['build_from' => 'full_name', 'save_to' => 'slug',];

 function panel()
    {
        return $this->belongsToMany(PlenaryPanel::class)->withTimestamps();
    }

    public function streamPanel()
    {
       return $this->belongsToMany(StreamPanel::class)->withTimestamps();
    }

    public function scopeSpeakerImage()
    {
        return $this->thumbnail ?: '/assets/frontend/placeholder/speaker-placeholder.png';
    }
}
