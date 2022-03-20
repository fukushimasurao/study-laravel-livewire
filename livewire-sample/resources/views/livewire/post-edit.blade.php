<div x-data="{open: @entangle('showModal').defer}">

    <input type="button" value="表示を切り替える" x-on:click="open = !open">
    <form wire:submit.prevent="register" class="my-5 bg-red-100" x-show="open">
        <div>
            タイトル：<input type="text" wire:model.lazy="post.title">
            {{-- ↓表示したりしなかったりするものは、divで囲む。詳しくはlaravelのトラブルシューティングにて。 --}}
            <div>@error('post.title')<span style="color:red">{{ $message }}</span>@enderror</div>
        </div>
        <div>
            本文：<textarea wire:model.lazy="post.body" cols="30" rows="5"></textarea>
            <div>@error('post.body')<span style="color:red">{{ $message }}</span>@enderror</div>
        </div>
        <div>
            <input type="submit" value="送信する">
        </div>
    </form>
</div>
