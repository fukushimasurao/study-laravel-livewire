<div>
    <form wire:submit.prevent="register" class="my-5 bg-sky-100">
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
                <span id="created-user-message" style="display: none">登録しました。</span>
            </div>
        </form>

        @push('js')
        <script>
            // PostCreate.phpにて、emitで、created-postを発生させていている。
            Livewire.on('created-post', () => {
                const messageBox = document.getElementById('created-user-message');
                messageBox.style.display = 'inline';
                setTimeout(() => {
                    messageBox.style.display = 'none';
                }, 1000);
            });
        </script>
        @endpush
</div>
