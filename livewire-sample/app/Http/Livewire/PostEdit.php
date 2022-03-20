<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostEdit extends Component
{
    public $post;
    public $showModal = false;

    protected $rules = [
        'post.title' => ['required', 'max:256'],
        'post.body' => ['required'],
    ];

    protected $listeners = ['showModal'];

    public function showModal(Post $post)
    {
        $this->post = $post;
        $this->showModal = true;
    }
    public function updated($key)
    {
        $this->validateOnly($key);
    }

    public function update()
    {
        $this->validate();
        $this->post->save();

        // emitでコンポーネントからイベントを発生
        $this->emit('updated-post');

        // $this->post = new Post;
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.post-edit');
    }
}
