<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yazarlar extends Model
{
    use HasFactory;
    protected $guarded=[];
    // protected $fillable = ['name', 'image', 'bio','selflink'];
    static function getField($id,$field) {
        $c=Yazarlar::where('id','=',$id)->count();
        if ($c!=0) {
            $w=Yazarlar::where('id','=',$id)->get();
            return $w[0][$field];

        } else {
            return 'Silinmis Yazar';
        }
        
    }
}
