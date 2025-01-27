@extends('layouts.layout-api-pagamento')

@section('title', 'Carrinho')

@section('content')
    <div class="bg-gray-200 flex justify-center items-center w-screen h-screen">
        <div class="bg-white w-[1200px] rounded-2xl p-10 flex flex-col justify-center items-center">
            <div class="grid grid-cols-6 gap-4 mb-6 text-xl text-center font-medium border-b-[3px] border-gray-300 pb-4 w-full">
                <p class="col-span-2">Produto</p>
                <p>Preço/unidade</p>
                <p>Quantidade</p>
                <p>Valor Final</p>
                <p>Ação</p>
            </div>
            @foreach ($cartProducts as $product)
                <div class="grid grid-cols-6 gap-4 place-items-center mb-4">
                    <img src="{{ $product->image }}" alt="Imagem do produto" class="w-48 h-auto">
                    <p class="text-2xl font-semibold">{{ $product->name }}</p>
                    <p class="text-2xl">{{ "R$ " . number_format($product->price, 2, ',', '.') }}</p>
                    <p class="text-2xl">{{ $product->quantity }}</p>
                    <p class="text-2xl font-semibold">{{ "R$ " . number_format($product->price * $product->quantity, 2, ',', '.') }}</p>
                </div>
            @endforeach
            <form action="/checkout" method="POST">
                @csrf
                <input type="hidden" name="cartProducts" value="{{ json_encode($cartProducts) }}">
                <button type="submit" class="bg-blue-800 p-4 rounded-lg text-white">COMPRAR</button>
            </form>
        </div>
    </div>
@endsection
