<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Comments extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $fillable = ['body','user_id','image'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getImagePathAttribute(){
        return Storage::url('comments/'.$this->image);
    }
}
