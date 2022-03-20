<div>

    <form>
        検索用語:<input type="text" wire:model="word">
    </form>
    <hr>
    <livewire:post-create>
    <hr>
    <livewire:post-edit>
    <hr>
    <table>
        @foreach ($posts as $post)
        <tr wire:key="post-{{ $post->id }}">
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            {{-- $emitTo(post-editに対して、showModalイベントを発行する。そのときパラメーター渡す) --}}
            <td wire:click="$emitTo('post-edit', 'showModal', {{ $post->id }})">変更する</td>
        </tr>
        @endforeach
    </table>
    <br>
    <div>
        {{ $posts->links() }}
    </div>
</div>
