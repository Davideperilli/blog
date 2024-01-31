<x-layout>
    <div class="container-fluid p-5">
        <div class="row justify-content-center">
            <h1 class="display-1 text-center text-mybrown h1-media" >Categoria {{$category->name}}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-around">
            @foreach($articles as $article)
            <div class="col-10 col-md-3 mt-5 mx-1 card-style">
                <div class="card-height hover-welcome">
                    <div>
                        <a href="{{route('article.show',compact('article'))}}"><img class="img-style " src="{{Storage::url($article->image)}}" alt="card image"></a>
                    </div>
                    <div class="">
                        <div class="my-2">Scritto da: <a href="{{route('article.byUser',['user'=>$article->user])}}" class="text-myblu ">{{$article->user->name}}</a></div>
                        <a href="{{route('article.byCategory',['category'=>$article->category->id])}}" class= "text-myblu ">{{$article->category->name}}</a>
                        <p class="small fst-italic">
                            @foreach($article->tags as $tag)
                            #{{$tag->name}}
                            @endforeach
                        </p>
                      <h5 class="card-title fs-3 ">{{$article->title}}</h5>
                      {{-- <p class="card-text">{{$article->subtitle}}</p> --}}
                      {{-- <p class="card-text">{{$article->category->name}}</p> --}}
                      <p class="card-text fs-6 ">{{Str::limit($article->body,50)}}</p>
                    </div>
                    <div class="footer-card d-flex justify-content-between align-items-center">
                        {{-- redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}} --}}
                        <a href="{{route('article.show',compact('article'))}}" class="btn-welcome my-3 fw-bold">Leggi</a>
                        <div class="text-muted small fst-italic">-tempo di lettura {{$article->readDuration()}} min</div>
                    </div>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
    
</x-layout>