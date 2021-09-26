<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'profilepic', 'bio'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
