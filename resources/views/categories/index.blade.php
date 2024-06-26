@extends('home')
@section('title')Категории@endsection

@section('content')
    <main>

        <div class="album py-5 bg-body-tertiary">
            <h3 class="fw-normal mb-5 text-center">Все категории</h3>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    @foreach($categories as $category)
                        <div class="card shadow-sm">

{{--                            <img alt="" class="p-4" src="https://resources.cdn-kaspi.kz/img/m/p/h39/h73/64332873957406.jpg?format=gallery-medium">--}}

                            <img class="p-4" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18d8a405a41%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18d8a405a41%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.421875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" >
                            <div class="card-body">
                                <a href="{{route('products.category', $category->id)}}"><p class="card-text">{{$category->name}}</p></a>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">

                                    @auth()
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                            <div class="btn-group">
                                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-success">Изменить</a>
                                            </div>
                                        @endif
                                    @endauth


                                    @auth()
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                            <div class="btn-group">
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth

                                    <small class="text-body-secondary">Код:{{$category->code}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </main>
@endsection
