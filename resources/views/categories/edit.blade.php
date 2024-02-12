@extends('home')
@section('title')Изменить категорию@endsection

@section('content')
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog p-4" role="document">
            <div class="modal-content rounded-4 shadow">

                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-2 fs-2">Изменить категорию</h1>
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

                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control rounded-3" id="floatingInput">
                            <label>Имя категории</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="code" cols="30" rows="3" class="form-control rounded-3"></textarea>
                            <label>Код категории ШИФР</label>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Изменить</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection



