<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Formulario extends Component
{

    public $categories, $tags;

    public PostCreateForm $postCreate;
    
    public PostEditForm $postEdit;

    public $posts;

    public function mount() {
        $this->categories = Category::all();
        $this->tags = Tag::all();

        $this->posts = Post::all();
    }

    public function save() {

        $this->postCreate->save();

        $this->posts = Post::all();

        $this->dispatch('post-created', 'Nuevo artículo creado');
        
    }

    public function edit($postId)
    {
        // si $this->resetValidation() da error en el Form Objets PostEditForm lo colocamos en este método
        // a mi me funcionó en el Form Objets PostEditForm por eso comenté la línea aquí abajo

        // $this->resetValidation();

        $this->postEdit->edit($postId);

    }

    public function update()
    {
        $this->postEdit->update();
        
        $this->posts = Post::all();

        $this->dispatch('post-created', 'Artículo actualizado');
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);

        $post->delete();

        $this->posts = Post::all();

        $this->dispatch('post-created', 'Artículo eliminado');

    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
