<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card p-4 my-4 shadow-sm">
                    <h3 class="text-primary text-center">Register form</h3>
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1">Name</label>
                          <input
                           type="text"
                           class="form-control"
                           id="exampleInputEmail1"
                           aria-describedby="emailHelp"
                           name = 'name'
                           value='{{old('name')}}'
                          required>
                            {{-- Error Message --}}
                          @error('name')
                          <ul>
                              <li><p class="text-danger">{{$message}}</p></li>
                          </ul>
                          @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            name = 'username'
                            value='{{old('username')}}'
                            required>
                            @error('username')
                            <ul>
                                <li><p class="text-danger">{{$message}}</p></li>
                            </ul>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            name = 'email'
                            value='{{old('email')}}'
                            required
                            >
                            @error('email')
                            <ul>
                                <li><p class="text-danger">{{$message}}</p></li>
                            </ul>
                            @enderror
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password"
                          class="form-control"
                          id="exampleInputPassword1"
                          name = 'password'

                          required>
                          @error('password')
                          <ul>
                              <li><p class="text-danger">{{$message}}</p></li>
                          </ul>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                        {{-- Error Message --}}
                        {{-- <ul>
                            @foreach ($errors->all() as $error)
                            <li>
                                <p class='text-danger'>{{$error}}</p>
                            </li>
                            @endforeach

                        </ul> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
