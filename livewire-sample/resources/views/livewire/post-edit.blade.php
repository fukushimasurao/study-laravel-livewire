<div>
    <x-modal wire:model="showModal">
        <form wire:submit.prevent="update" class="my-5 bg-red-100">
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
                <input type="submit" value="変更する">
            </div>
        </form>
    </x-modal>
</div>
