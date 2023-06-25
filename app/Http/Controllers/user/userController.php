<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function profile()
    {
        echo 'admin sayfasi';
        echo '<br>';
        $data=['name'=>'Mirvaleh','yas'=>22,'is'=>'Django Developer'];
        return view('admin/index',$data);
    }
    public function create()
    {
        echo 'Create sayfasi';
        echo '<br>';

        echo '<a href="'.route(name:'update').'" >Update Admin</a>';

        
    }
    public function update()
    {
        echo 'Update sayfasi';
        echo '<br>';

        echo '<a href="'.route(name:'delete').'" >Delete Admin</a>';
        
    }
    public function delete()
    {
        return 'Delete';
        
    }
}
