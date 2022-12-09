<?php
    use App\Models\User;
?>

@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <div class="d-flex gap-3 flex-wrap">
        @foreach ($users as $user )
        <div class="card" style="width: 18rem;">
            <img src={{asset("assets/img/users/" . $user->image)}} alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <div class="d-flex justify-content-between">
                    <p>{{$user->job->job ?? 'None'}}</p>
                    <p class="m-0">{{$user->role->role ?? 'None'}}</p>
                </div>
                <p class="card-text"></p>
                <form action="/update/role/{{$user->id}}" method="post" class="d-flex">
                    @csrf
                    @method('PUT')
                    <select name="role_id" class="p-1 mt-2 w-100 m-1 rounded" >
                        <option value="{{$user->role->id ?? 'None'}}">{{$user->role->role ?? 'None'}}</option>
                            @foreach ($roles as $role )
                                @if($user->role_id != $role->id )
                                    <option value="{{$role->id}}">{{$role->role}}</option>
                                @endif
                            @endforeach
                        
                    </select>
                    <input type="submit" value="modifier" class="m-1 rounded p-0">
                </form>
            </div>
          </div>
        @endforeach
    </div>

@endsection