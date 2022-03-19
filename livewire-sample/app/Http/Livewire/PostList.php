<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    public $word;
    public function render()
    {
        $posts = Post::query()
        ->when($this->word, fn($query, $value) => $query->where('title', 'LIKE', '%' . $value . '%'))
        ->get();

        return view('livewire.post-list',[
            // 'posts' =>Post::get(),
            'posts' => $posts,
        ]);
    }
}
