<x-layout>

    <div class="container-fluid p-5">
        <div class="row my-5 justify-content-center">
            <h1 class="display-1 text-center text-mybrown h1-media" >Modifica articolo</h1>
        </div>
    </div>

    @if(session('message'))
    <div class="alert text-center alert-light fw-bold fs-4">
        {{session('message')}}
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center mx-0 ">
            <div class="col-xl-7 col-lg-8 col-md-6 col-12 text-center">
                <div class="card p-4">
                    <form method="POST" action="{{route('article.update', compact('article'))}}" enctype="multipart/form-data" class="text-center">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-center my-2">
                            <div class="col-10">
                                <label for="image" class="form-lable fw-bold ">Inserisci immagine</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                        </div>
                        <div class="row justify-content-center my-2">
                            <div class="col-6 col-md-5">
                                <label for="title" class="form-label fw-bold ">Titolo:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{old('title')}}" id="title">
                              </div>

                              <div class="col-6 col-md-5">
                                <label for="subtitle" class="form-label fw-bold ">Sottotitolo:</label>
                                <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"
                                value="{{old('subtitle')}}" id="subtitle">
                              </div>
                        </div>
                        <div class="row justify-content-center my-4">
                            <div class="col-12 col-md-10">
                                <label for="category" class="form-label">Categoria:</label>
                                <select name="category" id="category" class="form-control text-capitalize">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if($article->category && $category->id == $article->category->id) selected @endif>{{$category->name}}</option>
                                      @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-10">
                                <label class="form-label" for="tags">Tags</label>
                                <input name="tags" id="tags" class="form-control" value="{{old('tags')}}">
                                <span class="small fst-italic">Dividi ogni tag con una virgola</span>
                            </div>
                            <div class="col-12 col-md-10">
                                <label for="body" class="form-label fw-bold ">Articolo completo</label>
                                <textarea type="text" name="body" id="body" cols="30" rows="7" class="form-control  @error('body') is-invalid @enderror">{{old('body')}}</textarea>
                            </div>  
                           <div class="d-flex justify-content-center ">
                            <button type="submit" class="btn-custom my-2 mt-5 mx-3">Modifica</button> 
                                <a href="{{route('home')}}" class="btn-custom mx-3 mt-5 my-2">Home</a>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
</x-layout>