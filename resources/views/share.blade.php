<form action="{{ route('shares.store') }}" method="post" class="share">
    @csrf
    <label for="share__textarea" class="share__label">Tell us about your day!</label>
    <textarea name="share" id="share__textarea" rows="4" class="{{ $errors->has('share') ? 'share__textarea--error' : '' }}"></textarea>
    @error ('share')
        <p class="share__error"> {{ $message }}</p>
    @enderror
    <button type="submit" class="share__btn">Share</button>
</form>
