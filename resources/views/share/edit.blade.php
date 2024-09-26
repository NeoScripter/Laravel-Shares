@extends('partials.app')

@section('title', 'Share')

@section('content')
    @include('partials/popup')
    <div class="share">
        <form enctype="multipart/form-data" action="{{ route('shares.update', $share->id) }}" method="post">
            @csrf
            @method('put')
            <div class="share__headline share__headline--profile">
                <div class="share__image">
                    <img src="{{ $share->user->getImageURL() }}" alt="{{ $share->user->name }}">
                </div>
                <div class="profile__wrapper">
                    <label for="profile-image" class="profile__label">Profile picture</label>
                    <input type="file" name="image" id="profile-image" class="profile__image">
                    @error('image')
                        <p class="share__error"> {{ $message }}</p>
                    @enderror
                </div>
                <h3 class="share__name">{{ $share->user->name }}</h3>
                <button class="share__btn share__btn--profile">Save</button>
            </div>
            <textarea name="edit_share" class="share__textarea" rows="4"
                class="{{ $errors->has('share') ? 'share__textarea--error' : '' }}">{{ $share->content }}</textarea>
            @error('edit_share')
                <p class="share__error"> {{ $message }}</p>
            @enderror
        </form>
        <div class="share__bottom">
            <form action="{{ route('shares.destroy', $share->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="share__delete-btn">Delete</button>
            </form>
            <div class="share__time">
                <img src="{{ asset('images/clock.svg') }}" alt="clock">
                {{ $share->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
@endsection
