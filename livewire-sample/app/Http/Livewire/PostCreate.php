<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostCreate extends Component
{

    public Post $post;

    protected $rules = [
        'post.title' => ['required', 'max:256'],
        'post.body' => ['required'],
    ];

    public function mount()
    {
        $this->post = new Post();
    }

    public function updated($key)
    {
        $this->validateOnly($key);
    }

    public function register()
    {
        $this->validate();
        $this->post->save();
        // emitでコンポーネントからイベントを発生
        $this->emit('created-post');
        $this->post = new Post;
    }

    public function render()
    {
        return view('livewire.post-create');
    }
}
