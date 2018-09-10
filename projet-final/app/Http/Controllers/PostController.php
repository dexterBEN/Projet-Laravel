<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{

    /*public function __construct(){
        //Méthode pour injecter des data à une vue partielle 
        view()->composer('partials.menu', function($view){
            $genres = Genre::pluck('name', 'id')->all();

            //dump($genres) ;
            $view->with('genres', $genres);
        });
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // return "dashboard";
        $posts = Post::with('picture', 'category')->paginate(10);
        return view('back.post.index', ['posts' => $posts]);
        
        /* Autre façon de faire:
        $posts = Post::with('picture', 'category')->where('post_type', array_random(['stage', 'formation', 'indéfinie']))->paginate(5);
        return view('back.post.index', ['posts' => $posts]);*/
    }

    public function create(){

    }

    public function store(){

    }

    public function show(int $id){
        $post = Post::find($id);

        return view('back.post.show', ['post'=> $post]);

    }

    public function edit(int $id){
        $post = Post::find($id);//Found id of the post and give it to the route
        $categories = Category::all()->pluck('name', 'id');

        /*$authors = Author::pluck('name', 'id')->all();
        $genres = Genre::pluck('name', 'id')->all();*/

        return view('back.post.edit', ['post'=> $post, 'categories'=>$categories]);//Donne accès à la page d'édition

    }

    public function update(){

    }

    public function destroy(){

    }
}
