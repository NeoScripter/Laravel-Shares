@extends('partials.app')

@section('title', 'Login')

@section('content')
    <div class="webform">
        <h1 class="webform__title">Login</h1>
        <form action="" class="webform__form">
            <div class="webform__group">
                <label for="" class="webform__label">Email <span>*</span></label>
                <input type="text" class="webform__input" id="email" name="email">
                <span class="webform__error"></span>
            </div>
            <div class="webform__group">
                <label for="password" class="webform__label">Password <span>*</span></label>
                <input type="password" class="webform__input" id="password" name="password">
                <span class="webform__error"></span>
            </div>
            <button type="submit" class="webform__btn">Log in</button>
        </form>
    </div>
@endsection
