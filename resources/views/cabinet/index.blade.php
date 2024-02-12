@extends('home')
@section('title')Личный кабинет@endsection
@section('content')

    <div class="album py-5 bg-body-tertiary">
        <h3 class="fw-normal mb-5 text-center">Кабинет</h3>
        <div class="container">
            <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName"><ya-tr-span data-index="32-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="First name" data-translation="Имя пользователя" data-ch="0" data-type="trSpan">Имя пользователя</ya-tr-span></label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName"><ya-tr-span data-index="33-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Last name" data-translation="Фамилия" data-ch="0" data-type="trSpan">Фамилия</ya-tr-span></label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Электронная почта</label>
                            <div class="input-group">
                                <input class="form-control" placeholder="{{ \Illuminate\Support\Facades\Auth::user()->email }}" readonly>
                                <button type="submit" class="btn btn-sm btn-success">Подтвердить</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Город</label>
                                <select class="custom-select d-block w-100 form-control" id="country" required="">
                                    <option value="">Выбирать...</option>
                                    <option>Актау</option>
                                </select>
                            </div>
                            <div class="col-md-7 mb-3">
                                <label for="zip">Адрес</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required="">
                            </div>
                        </div>

                        <hr class="mb-4">

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Сохранить</button>
                    </form>
        </div>
    </div>

@endsection
