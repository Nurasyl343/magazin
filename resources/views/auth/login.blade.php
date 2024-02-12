@extends('home')
@section('title')Авторизация@endsection

@section('content')
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog p-4" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-2 fs-2">Вход</h1>
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

                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="floatingInput" name="email">
                            <label for="floatingInput">Адрес электронной почты</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control rounded-3" id="floatingPassword" name="password">
                            <label for="floatingPassword">Пароль</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Авторизация</button>
                        <hr class="my-4">
                        <small class="text-body-secondary">Если у Вас нет аккаунта, нажмите здесь <a href="{{route('register.form')}}" class="link-opacity-25-hover">Регистрация</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
