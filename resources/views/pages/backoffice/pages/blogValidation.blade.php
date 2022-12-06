@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <div class="d-flex gap-2 flex-wrap p-2">
        @foreach ($blogs as $blog)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('assets/img/blog/' . $blog->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{$blog->title}}</h5>
                <div  class="d-flex justify-content-between">
                    <p>{{$blog->user->name}}</p>
                    <p>{{$blog->category_blogs->name}}</p>
                </div>
            
                <p class="card-text">{{ Str::limit($blog->text,100,'...') }}</p>
                <div class="d-flex justify-content-between">
                    <form class="d-flex mt-3" action="/blog/validate/{{$blog->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success rounded w-100">valider</button>
                    </form>
                </div>
                
                </div>
            </div>
        @endforeach
    </div>
@endsection