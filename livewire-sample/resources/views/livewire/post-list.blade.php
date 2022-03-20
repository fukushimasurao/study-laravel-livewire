<div>

    <form>
        検索用語:<input type="text" wire:model="word">
    </form>
    <hr>
    <livewire:post-create>
    <hr>
    <livewire:post-edit>

    <div style="height:30px">
        @if($this->updatedPost)
        <!-- 毎回毎回、別の div と認識させる為に、ランダムな wire:key を付与する。そうする事で、毎回 JS が実行される -->
        <div wire:key="{{ Str::random() }}" x-data="{show: false}" x-show="show" x-init="
                    setTimeout(fn => {show = true}, 10)
                    setTimeout(fn => {show = false}, 1500)
                " x-transition:enter.duration.500ms x-transition:leave.duration.400ms
            style="background-color:gold; width:200px;">変更しました。</div>
        @endif
    </div>

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
