@extends('home')
@section('title')Ошибка@endsection

@section('content')
    <main>

        <div class="d-flex align-items-center justify-content-center vh-100 bg-body-tertiary">
            <div class="text-center">
                <h1 class="display-1 fw-bold">403</h1>
                <p class="fs-3"> <span class="text-danger">Уппс!</span> У вас нет доступа.</p>
                <p class="lead">
                    Только для админа!
                </p>
            </div>
        </div>

    </main>
@endsection
