@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container mx-auto px-5">
    <h3>Hello, {{ Auth::user()->name }}. Your fee is {{ Auth::user()->month_fee }} Yen.</h3>
    <div class="card-body">
        <form action="{{ route('store') }}" method="post">
        @csrf
        @foreach($all_menus as $menu)
            <input type="radio" name="menu[]" value="{{ $menu->menu }}" class="mt-2 text-2xl" required>
            <label>{{ $menu->menu }}</label><br>
        @endforeach
            <button type="submit" name="reservate" class="mt-2 btn btn-success">Reserve</button>
        </form>
    </div>
</div>
@endsection
