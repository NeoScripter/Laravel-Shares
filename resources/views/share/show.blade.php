@extends('partials.app')

@section('title', 'Share')

@section('content')
    @include('partials/popup')
    <div class="share">
        <div class="share__headline">
            <div class="share__image">
                <img src="{{ asset('images/johndoe.jpg')}}" alt="John Doe">
            </div>
            <h3 class="share__name">Mario</h3>
            <button class="share__btn">Edit</button>
        </div>
        <div class="share__text">
            {{ $share->content }}
        </div>
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
