@extends('home')
@section('title')Корзина@endsection

@section('content')
    <main>

        <div class="album py-5 bg-body-tertiary vh-100">
            <h3 class="fw-normal mb-5 text-center">Корзина покупок</h3>
            <div class="container">

                <div class="row row-cols-2 g-3">

                    <div class="col-8 row row-cols-1 g-3 m-2">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>product_name</th>
                                    <th>number</th>
                                    <th>status</th>
                                    <th>price</th>
                                    <th>###</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productsInCart as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->pivot->number}}</td>
                                        <td>{{$product->pivot->status}}</td>
                                        <td>{{$product->price}} тенге</td>
                                        <td>
                                            <form action="{{ route('cart.deletefromcart', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit">Удалить из корзины</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <div class="col-4 row row-cols-1 g-3">
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-text">Итого:</h4>
                                        <h4 class="text-body-secondary">{{ $sum }} тенге</h4>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-body-secondary">Нажимая Купить, вы соглашаетесь<br>с условиями использования.</small>
                                        <form action="{{ route('cart.buy') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Купить все</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('cart.orders') }}" class="btn btn-warning">История покупок</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </main>
@endsection
