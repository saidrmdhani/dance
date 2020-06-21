<div wire:init="tweet" id="tweet-block">
    @if (session()->has('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
    <div wire:loading>
        <h5 class="mt-3 mb-3">يتم مشاركة الفيديو الآن</h5>
        <img src="{{ asset('img/loading.gif') }}" width="32" height="32">
    </div>
</div>
