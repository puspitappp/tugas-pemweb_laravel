<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    use HasFactory;

    protected $table = 'tb_users';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_email', 'user_nama', 'user_password'];

    // public function contact(){
    //     return $this->hasMany(Contact::class);
    // }
}
