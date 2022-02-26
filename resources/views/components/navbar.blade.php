<nav class="navbar navbar-dark bg-dark">
      <div class="container">
            <a class="navbar-brand" href="/">Creative Coder</a>
            <div class="d-flex">
                <a href="/" class="nav-link">Home</a>
                <a href="/#blogs" class="nav-link">Blogs</a>
                {{-- @if (!auth()->user())
                    <a href="/register" class="nav-link">Register</a>
                @else
                    <a href="" class="nav-link">Welcome {{auth()->user()->name}}</a>
                    <button type="submit" class="nav-link btn btn-link">Log out</button>
                @endif --}}
                @guest
                    <a href="/register" class="nav-link">Register</a>
                    <a href="/login" class="nav-link">Login</a>
                @else
                    <img style="height:50px;width:50px;border-radius:30px" src="{{auth()->user()->avatar}}" alt="">
                    <a href="" class="nav-link">Welcome {{auth()->user()->name}}</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Log out</button>
                    </form>

                @endguest

                <a href="#subscribe" class="nav-link">Subscribe</a>
            </div>
      </div>
</nav>
