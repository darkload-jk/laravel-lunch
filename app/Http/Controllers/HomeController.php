<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
// use App\Models\Menu;
// use App\Models\User;


class HomeController extends Controller{   
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $all_posts = Post::latest()->get();
        $all_menus = Menu::all();
        return view('users.home')
        ->with('all_menus', $all_menus)
        ->with('all_posts', $all_posts);
    }   
}
