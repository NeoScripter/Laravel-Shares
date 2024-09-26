

@if (session()->has('success'))
<div class="popup">
    <div class="popup__headline">
        <img src="{{ asset('images/check.svg') }}" alt="Checkmark">
        {{ session('success')}}
    </div>
    <p class="popup__content">{{ session('details')}}</p>
</div>
@endif
