@extends('layouts.app')

@section('content-s')

            <div class="card-group">
            <div class="card text-black bg-gray mr-3" style="max-width: 18rem;">
                <div class="card-header">MarsClothes</div>
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">{{$orders}}</p>
                </div>
            </div>
            <div class="card text-black bg-gray mr-3" style="max-width: 18rem;">
                <div class="card-header">MarsClothes</div>
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">{{$users}}</p>
                </div>
            </div>
            <div class="card text-black bg-gray  " style="max-width: 18rem;">
                <div class="card-header">MarsClothes</div>
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">{{$products}}</p>
                </div>
            </div>
        </div>


@endsection
