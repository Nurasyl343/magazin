@extends('home')
@section('title')Заказы@endsection

@section('content')
    <main>

        <div class="album py-5 bg-body-tertiary vh-100">
            <h3 class="fw-normal mb-5 text-center">Заказы</h3>
            <div class="container">

                <div class="row row-cols-2 g-3">

                    <div class="col-12 row row-cols-1 g-3">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">product_name</th>
                                    <th scope="col">number</th>
                                    <th scope="col">status</th>
                                    <th scope="col">price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productsOrdered as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->pivot->number}}</td>
                                        <td>{{$product->pivot->status}}</td>
                                        <td>{{$product->price}} тенге</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>

                </div>

            </div>
        </div>

    </main>
@endsection
