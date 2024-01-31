<x-layout>
    <div class="container-fluid">
        <div class="row text-center my-5 ">
            <h1 class="text-mybrown h1-media">LAVORA CON NOI</h1>
        </div>
    </div>
    <div class="container admin-tab">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <h2 class="text-myblu">Lavora come amministratore</h2>
                <p class="text-mybrown">Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eaque itaque labore cumque quos explicabo?</p>
                <h2 class="text-myblu">Lavora come revisore</h2>
                <p class="text-mybrown">Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eaque itaque labore cumque quos explicabo?</p>
                <h2 class="text-myblu">Lavora come redattore</h2>
                <p class="text-mybrown">Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eaque itaque labore cumque quos explicabo?</p>
            </div>
            <div class="col-12 col-md-8">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="my-5" action="{{route('careers.submit')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="role" class="form-label text-myblu fw-bold">Per quale ruolo ti stai candidando?</label>
                    <select name="role" id="role" class="form-control">
                     <option value="">Scegli qui</option>
                     <option value="admin">Amministratore</option>
                     <option value="revisor">Revisore</option>
                     <option value="writer">Redattore</option>
                    </select>
                    </div> 
                    <div class="mb-3">
                        <label for="email" class="form-label text-myblu fw-bold">email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email') ?? Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label text-myblu fw-bold">Parlaci di te</label>
                        <textarea  name="message" class="form-control" id="message" cols="30" rows="7" value="{{old('message')}}"></textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn-custom">Invia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>