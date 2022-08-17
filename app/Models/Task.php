<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title','salary','enabled','desc','cgy_id'];

    public function cgy(){
        return $this->belongsTo(Cgy::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
