<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{

    use WithPagination;

    public $word;
    public $title;
    public $body;

    // URLパラメータ使いたい場合
    protected $queryString = [
        'word' => ['except' => ''],
    ];

    protected $rules = [
        'title' => ['required'],
        'body' => ['required'],
    ];

    public function updatingWord()
    {
        $this->resetPage();
    }


    public function register()
    {
        $data = $this->validate();

        Post::create($data);

        // 登録の欄を空にする。
        $this->title = '';
        $this->body = '';

    }

    public function render()
    {
        $posts = Post::query()
        ->orderByDesc('id')
        ->when($this->word, fn($query, $value) => $query->where('title', 'LIKE', '%' . $value . '%'))
        ->paginate(10);
        // ->get();

        return view('livewire.post-list',[
            // 'posts' =>Post::get(),
            'posts' => $posts,
        ]);
    }
}
