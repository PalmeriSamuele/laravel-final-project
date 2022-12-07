<nav class="navbar navbar-dark bg-dark">
    <div class="d-flex gap-3 ">
        
        <a class="nav-link text-secondary" href="/"><-</a>
        @can('isAdmin')
            <a class="nav-link text-secondary" href="/backoffice">Home</a>
            <a class="nav-link text-secondary" href="{{route('banners')}}">Banners</a>
            <a class="nav-link text-secondary" href="{{route('backoffice-users')}}">Users</a>
            <a class="nav-link text-secondary" href="{{route('backoffice-teams')}}">Teams</a>
        @endcan

        @canany(['isStock','isAdmin'])
            <a class="nav-link text-secondary" href="/create/product">New product</a>
            <a class="nav-link text-secondary" href="{{ route('backoffice-products')}}">Products</a>
        @endcan
        @canany(['isWeb','isAdmin'])
            <a class="nav-link text-secondary" href="/backoffice/validation/blogs">Blog Validation</a>
        @endcan
        @canany(['isWeb','isRed', 'isAdmin'])
            <a class="nav-link text-secondary" href="{{route('create-blog')}}">New Blog</a>
            <a class="nav-link text-secondary" href="{{route('backoffice-blogs')}}">Blogs</a>
        @endcan
     
        
    </div>
  </nav>