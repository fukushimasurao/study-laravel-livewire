<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{

    use WithPagination;

    public $word;

    // URLパラメータ使いたい場合
    protected $queryString = [
        'word' => ['except' => ''],
    ];

    public function updatingWord()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::query()
        ->when($this->word, fn($query, $value) => $query->where('title', 'LIKE', '%' . $value . '%'))
        // ->get();
        ->paginate(10);

        return view('livewire.post-list',[
            // 'posts' =>Post::get(),
            'posts' => $posts,
        ]);
    }
}
