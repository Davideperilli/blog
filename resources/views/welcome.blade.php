<x-layout>
    

    <div class="container-fluid position-relative">
        <div class="row h-100 align-items-center justify-content-center">
            
            <div class="col-12 h-100 p-0">
                <div class="h-100 w-100 container-video flex-column ">
                    <h1 class="text-center title-transparent h1-media">THE AULAB POST</h1>
                    {{-- <i class="fa-solid fa-chevron-down fa-fade fa-2x text-myblu my-5 "></i> --}}
                </div>
                <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" class="myVideo p-0 m-0">
                    <source src="/storage/image/header.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>

    @if(session('message'))
    <div class="alert text-center alert-light fw-bold fs-4">
        {{session('message')}}
    </div>
    @endif


    <div class="container">
        <div class="row justify-content-around">
            <h2 class="text-center display-2 my-5 text-mybrown">Articoli recenti</h2>
            @foreach($articles as $article)
            <div class="col-10 col-md-3 mt-5 mx-1 ">
                <div class="hover-welcome" style="">
                    <a href="{{route('article.show',compact('article'))}}"><img class="img-style " src="{{Storage::url($article->image)}}" alt="card image"></a>
                    <div>
                        <div class="my-2">Scritto da: <a href="{{route('article.byUser',['user'=>$article->user])}}" class="text-myblu ">{{$article->user->name}}</a></div>
                        @if($article->category)
                        <a href="{{route('article.byCategory',['category'=>$article->category->id])}}" class= "text-myblu ">{{$article->category->name}}</a>
                        @else
                        <p class="small text-muted fst-italic text-capitalize">Non categorizzato</p>
                        @endif
                        <p class="small fst-italic">
                            @foreach($article->tags as $tag)
                            #{{$tag->name}}
                            @endforeach
                        </p>
                      <h5 class="card-title fs-3 ">{{$article->title}}</h5>
                      {{-- <p class="card-text">{{$article->subtitle}}</p> --}}
                      {{-- <p class="card-text">{{$article->category->name}}</p> --}}
                      <p class="card-text fs-6 ">{{Str::limit($article->body,100)}}</p>
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