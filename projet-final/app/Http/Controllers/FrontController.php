<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;//Import de l'alias  pour que le modèle soit dispo


class FrontController extends Controller
{

    private $paginate = 5 ;

    //Méthode permettant de d'afficher les deux dernier stage/formation disponible
    public function index(){
        //$posts = Post::all();// Retourne tous les Post disponible

        // Retourne les deux dernier post disponible en les ordonnant par date:
        $posts = Post::orderByDate()->with('picture', 'category')->limit(2)->get(); 
        
        return view('front.index', ['posts' => $posts]);
    }
    
    //Permet d'afficher le détail d'un post:
    public function show(int $id){
        $post = Post::find($id);

        return view('front.show', ['post'=> $post]);
    }

    public function showFormations(){
        
        $posts = Post::where('post_type', 'formation')->paginate($this->paginate);
        
        return view('front.formations', ['posts'=> $posts]);

        /*$type = DB::selectOne("SHOW COLUMNS FROM `posts` WHERE Field = 'post_type'")->Type;
        preg_match("/(formation)/", $type, $matches);
        $first = $matches[1];*/
    
        //dump($first);
    }

    public function showStages(){
        $posts = Post::where('post_type', 'stage')->paginate($this->paginate);

        return view('front.stages', ['posts'=>$posts]);
    }

    public function showContactForm(){
        return view('front.contact');
    }

    public function showResearch(Request $request){

        // dd($request->search); // die avec vardump Laravel
        $query = $request->search;

        // Ici la requête permet de faire une recherche sur les différents champs de la table posts
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orWhere('post_type', 'LIKE', '%' . $query . '%')
            ->paginate(5);

        return view('front.search', ['posts' => $posts]); 

    }
}
