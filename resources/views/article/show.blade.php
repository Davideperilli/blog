<x-layout>


<div class="container">
    <div class="row my-5 text-center">
        <h1 class="text-mybrown h1-media">{{$article->title}}</h1>
    </div>
</div>


<div class="container mt-5 min-vh-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-md-6 d-flex justify-content-center card-show"><img class="img-show" src="{{Storage::url($article->image)}}" alt=""></div>
        <div class="col-10 col-md-5">
            <div class="d-flex flex-column ">
                <div class="">
                    
                    <p class="small fst-italic">
                        @foreach($article->tags as $tag)
                        #{{$tag->name}}
                        @endforeach
                    </p>
                  <h5 class="card-title fs-3 ">{{$article->title}}</h5>
                  <p class="card-text fw-bold">{{$article->subtitle}}</p>
                  <p class="card-text fs-6 ">{{$article->body}}</p>
                </div>
                <div class="footer-card my-2">
                    <div>Redatto il {{$article->created_at->format('d/m/Y')}} da <a href="{{route('article.byUser',['user'=>$article->user])}}" class="text-myblu ">{{$article->user->name}}
                    </div>

                    <div><a href="{{route('article.byCategory',['category'=>$article->category->id])}}" class= "text-myblu ">{{$article->category->name}}</a>
                    </div>
                    <div class="my-5">
                        <a href="{{route('article.index')}}" class="btn-welcome fw-bold text-myblu">Torna indietro</a>
                    </div>
                </div>
            </div>
            <div class="d-flex my-2 ">
                @if(Auth::user() && Auth::user()->is_revisor)
                <a href="{{route('revisor.acceptArticle',compact('article'))}}" class="btn-custom mx-1 my-2 ">Accetta</a>
                <a href="{{route('revisor.rejectArticle',compact('article'))}}" class="btn-custom mx-1 my-2 ">Rifiuta</a>
                @endif
            </div>
        </div>
    </div>
</div>


</x-layout>