@extends('partials.app')

@section('title', 'Login')

@section('content')
    <div class="webform">
        <h1 class="webform__title">Login</h1>
        <form action="{{ route('authenticate') }}" class="webform__form" method="POST">
            @csrf
            <div class="webform__group">
                <label for="email" class="webform__label">Email <span>*</span></label>
                <input type="email" class="webform__input" id="email" name="email">
                @error('email')
                    <span class="webform__error"> {{ $message }}</span>
                @enderror
            </div>
            <div class="webform__group">
                <label for="password" class="webform__label">Password <span>*</span></label>
                <input type="password" class="webform__input" id="password" name="password">
                @error('password')
                <span class="webform__error"> {{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="webform__btn">Log in</button>
        </form>
    </div>
@endsection
