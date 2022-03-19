<div>
    <ul>
        @foreach ($posts as $post)
        <li wire:key="post-{{ $post->id }}">
            {{ $post->title }}
        </li>
        @endforeach
    </ul>
</div>
