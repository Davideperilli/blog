<x-layout>
    
    
<div class="container">
    <div class="row my-5 justify-content-center text-center">
        <h1 class="text-mybrown h1-media">Accedi</h1>
    </div>
</div>
    @if (session('message'))
    <div class="alert alert-light fw-bold fs-4">
        {{session('message')}}
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger fw-bold fs-6 my-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="container">
        <div class="row d-flex justify-content-center vh-100">
            <div class="col-md-6 col-10 text-center">
           
                <div class="form-register">
                    <form method="POST" action="{{route('login')}}" class="text-center">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-8 my-3">
                                <label for="email" class="form-label">Email Utente</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{old('email')}}" id="email">
                                @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-8 mb-3">
                                <label for=password" class="form-label">Password Utente</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-10 col-md-8 d-flex justify-content-center mb-3">
                                <button type="submit" class="btn-custom">Accedi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
</x-layout>