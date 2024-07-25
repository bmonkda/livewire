<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Formulario extends Component
{

    public $categories, $tags;

    public $category_id = '', $title, $content;

    public $selectedTags = [];

    public $posts;

    public $postEditId = '';

    public $postEdit = [
        'title'=> '', 
        'content'=> '',
        'category_id'=> '', 
        'tags'=>[]
    ];

    public $postCreate = [
        'title'=> '', 
        'content'=> '',
        'category_id'=> '', 
        'tags'=>[]
    ];

    public $open = false;


    public function rules() {
        return[
            'postCreate.title' => 'required',
            'postCreate.content' => 'required',
            'postCreate.category_id' => 'required|exists:categories,id',
            'postCreate.tags' => 'required|array',
        ];
    }

    public function messages() {
        return[
            'postCreate.title.required' => 'El campo título es requerido',
        ];
    }

    public function validationAttributes() {
        return[
            'postCreate.category_id' => 'categoría',
        ];

    }

    public function mount() {
        $this->categories = Category::all();
        $this->tags = Tag::all();

        $this->posts = Post::all();
    }

    public function save() {

        $this->validate();

        /* $this->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'selectedTags' => 'required|array',

        ],[
            'title.required' => 'El campo título es requerido',
        ],[
            'category_id' => 'categoría'
        ]); */

        /* $post = Post::create([
            'category_id' => $this->category_id, 
            'title' => $this->title, 
            'content' => $this->content
        ]); */
        $post = Post::create([
            'category_id' => $this->postCreate['category_id'], 
            'title' => $this->postCreate['title'], 
            'content' => $this->postCreate['content']
        ]
            /* $this->only('category_id','title','content') */
            
        );

        $post->tags()->attach($this->postCreate['tags']);

        // $this->reset(['category_id','title','content','selectedTags']);
        $this->reset(['postCreate']);

        $this->posts = Post::all();
        
    }

    public function edit($postId)
    {
        $this->resetValidation();

        $this->open = true;

        $this->postEditId = $postId;

        $post = Post::find($postId);

        $this->postEdit['category_id'] = $post->category_id;
        $this->postEdit['title'] = $post->title;
        $this->postEdit['content'] = $post->content;
        $this->postEdit['tags'] = $post->tags->pluck('id')->toArray();

    }

    public function update()
    {

        $this->validate([
            'postEdit.title' => 'required',
            'postEdit.content' => 'required',
            'postEdit.category_id' => 'required|exists:categories,id',
            'postEdit.tags' => 'required|array',

        ]);

        $post = Post::find($this->postEditId);
        $post->update([
            'category_id' => $this->postEdit['category_id'],
            'title' => $this->postEdit['title'],
            'content' => $this->postEdit['content']
        ]);

        $post->tags()->sync($this->postEdit['tags']);

        $this->reset(['postEditId', 'postEdit', 'open']);
        
        $this->posts = Post::all();
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);

        $post->delete();

        $this->posts = Post::all();

    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
