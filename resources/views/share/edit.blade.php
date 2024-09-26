@extends('partials.app')

@section('title', 'Share')

@section('content')
    @include('partials/popup')
    <div class="share">
        <form action="{{ route('shares.update', $share->id) }}" method="post">
            @csrf
            @method('put')
            <div class="share__headline">
                <div class="share__image">
                    <img src="{{ asset('images/johndoe.jpg')}}" alt="John Doe">
                </div>
                <h3 class="share__name">Mario</h3>
                <button class="share__btn">Save</button>
            </div>
            <textarea name="edit_share" class="share__textarea" rows="4" class="{{ $errors->has('share') ? 'share__textarea--error' : '' }}">{{ $share->content }}</textarea>
            @error ('edit_share')
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
                <img src="{{ asset('images/clock.svg')}}" alt="clock">
                {{ $share->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
@endsection
