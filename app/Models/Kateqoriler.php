<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kateqoriler extends Model
{
    use HasFactory;
    protected $guarded;
    public function children()
    {
        return $this->hasMany(Kateqoriler::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Kateqoriler::class, 'parent_id');
    }

    static function getField($id, $field)
    {
        $c = Kateqoriler::where('id', '=', $id)->count();
        if ($c != 0) {
            $w = Kateqoriler::where('id', '=', $id)->get();

            return $w[0][$field];
        } else {
            return 'Silinmis Kateqori';
        }
    }
    public static function tree()
    {
        $allCategories = Kateqoriler::all();
        $rootCategories = $allCategories->whereNull('parent_id');
        self::formatTree($rootCategories,$allCategories);
        return $rootCategories;
    }
    private static function formatTree($categories,$allCategories) {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id', $category->id);

            if ($category->children->isNotEmpty()) {
                self::formatTree($category->children,$allCategories);

            }
            
        }
    }
}
