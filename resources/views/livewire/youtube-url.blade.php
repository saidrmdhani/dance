<div>
    <form wire:submit.prevent="checkUrl" wire:loading.class="checking-url">
        <div class="form-group">
            <input type="url" wire:model="url" class="form-control text-center mt-3 mb-1" id="url" placeholder="أدخل رابط اليوتيوب">
            @error('url') <span class="error">الرجاء إدخال رابط صحيح مع https</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">أكمل <span class="fas fa-cat"></span></button>
    </form>
    <div wire:loading>
        <img src="{{ asset('img/loading.gif') }}" width="32" height="32">
    </div>
    @if (session()->has('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</div>
