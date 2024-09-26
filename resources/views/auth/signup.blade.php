@extends('partials.app')

@section('title', 'Sing Up')

@section('content')
    <div class="webform">
        <h1 class="webform__title">Sign up</h1>
        <form action="{{ route('signup.post') }}" class="webform__form" method="POST">
            @csrf
            <div class="webform__group">
                <label for="username" class="webform__label">Username <span>*</span></label>
                <input type="text" class="webform__input" id="username" name="username">
                @error('username')
                    <span class="webform__error"> {{ $message }}</span>
                @enderror
            </div>
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
            <div class="webform__group">
                <label for="confirm-password" class="webform__label">Confirm Password <span>*</span></label>
                <input type="password" class="webform__input" id="confirm-password" name="password_confirmation">
                @error('password_confirmation')
                    <span class="webform__error"> {{ $message }}</span>
                @enderror
            </div>
            <div class="webform__checkbox-group">
                <div class="webform__checkbox-wrapper">
                    <input type="checkbox" class="webform__checkbox" id="data-consent" name="data-consent">
                    <label for="data-consent" class="webform__label">I consent to share my email <span>*</span></label>
                </div>
                @error('data-consent')
                    <span class="webform__error"> {{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="webform__btn">Sign up</button>
        </form>
    </div>
@endsection
