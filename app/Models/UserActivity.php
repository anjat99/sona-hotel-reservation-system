<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $table = "user_activities";
    protected $fillable = ['user_id','activity','date','ip_address'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

}
