<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Post;
use App\Category;
use App\Picture;
use Carbon\Carbon;
use Storage;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $posts = Post::orderBy('created_at', 'desc')->with('picture', 'category')->paginate(10);
        return view('back.post.index', ['posts' => $posts]);
        
        /* Autre façon de faire:
        $posts = Post::with('picture', 'category')->where('post_type', array_random(['stage', 'formation']))->paginate(5);
        return view('back.post.index', ['posts' => $posts]);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = Category::pluck('name', 'id')->all();
        return view('back.post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //Condition de validité des champs de saisie
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'string|max:255',
            'post_type' => 'in:stage,formation',
            'maxStudent' => 'integer',
            'date_début' => 'date',
            'date_fin' => 'date|after:date_début',
            'price' => 'numeric',
            'category_id' => 'integer',
            'picture' => 'image|max:3000',
            'status' => 'in:published,unpublished'
        ]);
        $post = Post::create($request->all());
        
        $picture = $request->file('picture');

        //Véification de l'existance de l'image
        if(!empty($picture)){
            $link = $request->picture->store('/');
            
            $post->picture()->create([
                'title' => $request->title_image?? $request->title,
                'link' => $link
            ]);
        }

        $post->category()->attach($request->category);
        $post->save();
        return redirect()->route('post.index')->with('message', 'Votre post à bien été créer');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id){
        $post = Post::find($id);
        return view('back.post.show', ['post'=> $post]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id){
        $post = Post::find($id);//Found id of the post and give it to the route
        $categories = Category::all()->pluck('name', 'id');

        $date_début =  Carbon::parse($post->date_début)->format('d-m-Y');
        $date_fin =  Carbon::parse($post->date_fin)->format('d-m-Y');
        
        return view('back.post.edit',   [   
                                            'post'=> $post, 
                                            'categories'=> $categories,
                                            'date_début' => $date_début,
                                            'date_fin' => $date_fin
                                        ]);//Fournis les information à la page édition et la renvoie

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'string|max:255',
            'post_type' => 'in:stage,formation',
            'maxStudent' => 'integer',
            'date_début' => 'date',
            'date_fin' => 'date|after:date_début',
            'price' => 'numeric',
            'category_id' => 'integer',
            'picture' => 'image|max:3000',
            'status' => 'in:published,unpublished'
        ]);

        $post = post::find($id);
        $post->update($request->all());

        $picture = $request->file('picture');
        if(!empty($picture)){
            $link = $picture->store('/');
            
            // Vérification de l'existance de l'image
            if(is_null($post->picture)==false){
                Storage::disk('local')->delete($post->picture->link); // supprimer physiquement l'image
                $post->picture()->delete(); // supprimer l'information en base de données
            }
            $post->picture()->create([
                'title' => $request->title_image?? $request->title,
                'link' => $link
            ]);
        }
        
        //Créer le lien entre la category et le post:
        $post->category()->attach($request->category);
        $post->save();

        return redirect()->route('post.index')->with('message', 'Votre post à bien été éditer');//Retour à l'accueil de l'admin avec un message de success
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){

        
        /*https://stackoverflow.com/questions/47544109/laravel-cannot-delete-or-update-a-parent-row-a-foreign-key-constraint-fails*/
        $post = Post::find($id);
        $picture = $request->file('picture');
        if($post->picture){
            Storage::disk('local')->delete($post->picture->link);
        }
        $post->picture()->delete();
        $post->delete();

        return redirect()->route('post.index')->with('message', 'Votre post à bien été supprimé');
    }
}
