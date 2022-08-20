<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function day()
    {
        return $this->hasOne(Day::class, 'id', 'day_id');
    }

    public function activity()
    {
        return $this->hasOne(Activity::class, 'id', 'activity_id');
    }
}
