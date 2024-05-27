<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;


class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'birthdate',
        'profile_photo',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   


}
