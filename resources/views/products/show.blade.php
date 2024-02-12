@extends('home')
@section('title')Продукт@endsection

@section('content')
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog p-4" role="document">
            <div class="modal-content rounded-4 shadow">

                <div class="card shadow-sm">

                    <img class="p-4" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18d8a405a41%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18d8a405a41%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.421875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" >

                    <div class="card-body">
                        <p class="card-text">{{$product->name}}</p>
                        <p class="card-text">Цена: {{$product->price}} тенге</p>
                        <p class="card-text">Размер: {{$product->size}}''</p>
                        <p class="card-text">Описание: {{$product->description}}</p>
                        @auth()
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                <div class="btn-group">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-success">Изменить</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                        <hr>

                        <div class="d-flex justify-content-between align-items-center">

                            <form action="{{ route('cart.puttocart', $product->id) }}" method="post">
                                @csrf
                                <div class="input-group w-50">
                                    <input class="form-control" type="number" name="number" placeholder="1" value="1">
                                    <button type="submit" class="btn btn-sm btn-success">В корзину</button>
                                </div>
                            </form>

                            <small class="text-body-secondary">Продано: {{$product->sold}} штук</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



