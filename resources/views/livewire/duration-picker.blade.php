<div>
    @if ($url != "")
    <img class="thumbnail mb-3" src="{{$thumbnail}}">
    <form wire:submit.prevent="createClip">
        <div class="form-group">
            <h4>اسم المقطع</h4>
            <input type="text" wire:model="clipName" name="clipName" class="form-control text-center" id="clipName" placeholder="الرجاء إدخال اسم للمقطع">
            @error('clipName') <span class="error">الرجاء إدخال اسم المقطع على أن لا يزيد عن 100 حرف</span> @enderror
        </div>
        <h5 class="mb-3">طول المقطع: {{(int)($duration/60)}} دقيقة و {{($duration%60)}} ثانية</h5>
        <h4 class="mt-3">وقت بداية المقطع</h4>
        <div class="form-row justify-content-md-center">
            <div class="form-group col-md-4">
                <label for="minutes">الدقيقة</label>
                <input type="number" min="0" wire:model="minutes" class="form-control text-center" name="minutes" id="minutes" placeholder="0" value="0">
            </div>
            <div class="form-group col-md-4">
                <label for="seconds">الثانية</label>
                <input type="number" min="0" wire:model="seconds" class="form-control text-center" name="seconds" id="seconds" placeholder="0" value="0">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">إنشاء المقطع</button>
    </form>
    <div wire:loading>
        <img src="{{ asset('img/loading.gif') }}" width="32" height="32">
    </div>
    @if (session()->has('file'))
        <div class="alert mt-3">
            <a href="{{ session('file') }}" target="_blank" class="btn btn-primary">قم بتحميل المقطع</a>
            <a href="https://twitter.com/intent/tweet?text={{$clipName}}&#10;&amp;url=https://3tabdance.com{{ session('file') }}&amp;via=teahill_oman&amp;hashtags=عتاب_ترقص" class="social-button btn btn-primary" target="_blank"><span class="fab fa-twitter"></span> شاركها</a>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
    @endif
</div>
