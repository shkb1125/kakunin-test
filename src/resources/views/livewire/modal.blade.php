<div>
    <button wire:click="openModal()" type="button" class="open_modal">
        モーダルを表示
    </button>

    @if ($showModal)
        <div class="modal">
            <div class="modal_content">
                <h3 class="modal_content-header">
                    モーダルタイトル
                </h3>
                <div class="modal_content-body">
                    <p class="">
                        モーダルの内容をここに記述します。
                    </p>
                </div>
            </div>
            <div class="modal_content-button">
                <button wire:click="closeModal()" type="button" class="">
                    閉じる
                </button>
            </div>
        </div>
    @endif
</div>
