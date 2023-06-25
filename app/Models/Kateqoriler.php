<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kateqoriler extends Model
{
    use HasFactory;
    protected $guarded;


    static function getField($id,$field) {
        $c=Kateqoriler::where('id','=',$id)->count();
        if ($c!=0) {
            $w=Kateqoriler::where('id','=',$id)->get();
            
            return $w[0][$field];

        } else {
            return 'Silinmis Kateqori';
        }
        
    }
}
