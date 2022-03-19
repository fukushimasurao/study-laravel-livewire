<div>

    <form>
        検索用語:<input type="text" wire:model="word">
    </form>
    <ul>
        @foreach ($posts as $post)
        <li wire:key="post-{{ $post->id }}">
            {{ $post->title }}
        </li>
        @endforeach
    </ul>
</div>
