@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <div class="col-lg-4 m-auto d-flex justify-content-center flex-column">
        @foreach ($orders as $order )
            <div class="alert alert-secondary d-flex gap-3 justify-content-between">
                <p class="m-0">N {{$order->code}}</p>
                <p class="m-0">{{$order->user->name}}</p>
                <form action="/delete/order/{{$order->id}}" method="post">
                    @csrf
                    @method('DELETE')     
                    <button type="submit" class='btn btn-danger rounded'>annuler</button> 
                </form>
            </div>

        @endforeach


    </div>
@endsection