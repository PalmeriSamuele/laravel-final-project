<section class="w-75 m-auto">
    <h3>Banners</h3>
    <div class="d-flex flex-column gap-4 ">
        @foreach ($banners as $banner)
            <div class="border">
                <h4 class="text-center">{{$banner->section}}</h4>
                <img src='{{asset('assets/img/bg/'. $banner->image)}}' alt="">  
            </div>
            <form action="/backoffice/update/banner/{{$banner->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="file" class="btn btn-secondary" name="image" id="">
                <input type="submit" class="btn btn-success" value="modifier">
            </form>
     
        @endforeach

    </div>
</section>