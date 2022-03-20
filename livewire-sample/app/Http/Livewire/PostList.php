<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $word;
    public $updatedPost = false;


    // URLパラメータ使いたい場合
    protected $queryString = [
        'word' => ['except' => ''],
    ];

    // emitでコンポーネントからイベントを発生させたものを受け取る。
    protected $listeners = [
        'created-post' => '$refresh',
        'updated-post' => 'updatedPost',
    ];

    public function updatedPost()
    {
        $this->updatedPost = true;
    }

    public function updatingWord()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::query()
            ->orderByDesc('id')
            ->when($this->word, fn ($query, $value) => $query->where('title', 'LIKE', '%' . $value . '%'))
            ->paginate(10);

        return view('livewire.post-list', [
            // 'posts' =>Post::get(),
            'posts' => $posts,
        ]);
    }
}
