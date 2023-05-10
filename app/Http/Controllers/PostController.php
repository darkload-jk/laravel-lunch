<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Menu;
use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller{
    private $post;
    private $menu;
    public function __construct(Post $post, Menu $menu){
        $this->post = $post;
        $this->menu = $menu;
    }

    public function create(){
        $all_menus = Menu::all();
        $all_posts = Post::all();
        return view('users.home')->with('all_menus', $all_menus)
                                 ->with('all_posts', $all_posts);
    }

    public function store(Request $request){
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $total_fee = Auth::user()->month_fee;
        
        $menu = Menu::where('menu', '=', $request->input('menu'))->first();
        $post->menu_id = $menu->menu_id;
        $post->price_id = $menu->price_id;
        
        $price = Price::where('price_id', '=', $post->price_id)->first();
        $total_fee += $price->price;
        $post->save();
      
        $menu_posts = [];
        $menu_posts[] = [
            'post_id' => $post->post_id,
            'user_id' => $post->user_id,
            'menu_id' => $post->menu_id,
            'price_id' => $post->price_id,
        ];   

   
    $user = User::find(Auth::user()->id);

    $user->update([
        'month_fee' => $total_fee,
    ]);

    $post->menuPost()->createMany($menu_posts); 
    return redirect()->route('index');
    }
    
	/**
	 * @return mixed
	 */
	public function getMenu() {
		return $this->menu;
	}
	
	/**
	 * @param mixed $menu 
	 * @return self
	 */
	public function setMenu($menu): self {
		$this->menu = $menu;
		return $this;
	}
}