<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Yazarlar;
class Kitaplar extends Model
{
    // use SoftDeletes;
  
    // protected $dates = ['deleted_at'];
    use HasFactory;
    protected $guarded=[];

    public function comments()
    {
        return $this->hasMany(Comment::class,'kitap_id')->whereNull('parent_id');
    }
}
