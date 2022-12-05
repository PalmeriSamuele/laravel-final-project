@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <div class="d-flex gap-3 flex-wrap">
        @foreach ($teams as $user )
        <div class="card" style="width: 18rem;">
            <img src={{asset("assets/img/users/" . $user->image)}} alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <div class="d-flex justify-content-between">
                    <p>{{$user->job->job ?? 'None'}}</p>
                    <p class="m-0">{{$user->role->role }}</p>
                </div>
                <p class="card-text"></p>
                <form action="/update/job/{{$user->id}}" method="post" class="d-flex">
                    @csrf
                    @method('PUT')
                    <select name="job_id" class="p-1 mt-2 w-100 m-1 rounded" >
                        <option value="{{$user->role->id}}">{{$user->job->job ?? 'None' }}</option>
                            @foreach ($jobs as $job )
                                @if($user->job_id != $job->id )
                                    <option value="{{$job->id}}">{{$job->job}}</option>
                                @endif
                            @endforeach
                        
                    </select>
                    <input type="submit" value="modifier" class="m-1 rounded p-0">
                </form>
            </div>
          </div>`   
        @endforeach
    </div>

@endsection