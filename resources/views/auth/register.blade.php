@extends('home')
@section('title')Регистрация@endsection

@section('content')
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Регистрация</h1>
                </div>

                <div class="modal-body p-5 pt-0">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="name" class="form-control rounded-3" id="floatingName" name="name">
                            <label for="floatingName">Имя</label>
                        </div>
{{--                        <div class="form-floating mb-3">--}}
{{--                            <input type="surname" class="form-control rounded-3" id="floatingSurname" placeholder="Тітірбайұлы">--}}
{{--                            <label for="floatingSurname">Фамилия</label>--}}
{{--                        </div>--}}
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="floatingInput" name="email">
                            <label for="floatingInput">Адрес электронной почты</label>
                        </div>
{{--                        <div class="form-floating mb-3">--}}
{{--                            <input type="tel" pattern="87[0-9]{9}" class="form-control rounded-3" id="floatingNumber" placeholder="87471231111">--}}
{{--                            <label for="floatingNumber">Номер телефона 8 7XX XXX XX XX</label>--}}
{{--                        </div>--}}
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword" name="password">
                            <label for="floatingPassword">Пароль</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword_Confirmation" name="password_confirmation">
                            <label for="floatingPassword_Confirmation">Подтвердите пароль</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Зарегистрироваться</button>
                        <small class="text-body-secondary">Нажимая Зарегистрироваться, вы соглашаетесь с условиями использования.</small>
                        <hr class="my-4">
                        <small class="text-body-secondary">Если у Вас уже есть аккаунт, нажмите здесь <a href="{{route('login.form')}}" class="link-opacity-25-hover">Войти</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
