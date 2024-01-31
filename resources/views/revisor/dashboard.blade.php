<x-layout>

    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <h1 class="display-1 text-center text-mybrown h1-media">Dashboard <span class="text-myblu">Revisore</span></h1>
        </div>
    </div>
    @if(session('message'))
    <div class="alert text-center alert-light fw-bold fs-4">
        {{session('message')}}
    </div>
    @endif
    
    <div class="container admin-tab">
        <div class="row my-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-myblu">Articoli da revisionare</h5>
                        <x-articles-table :articles="$unrevisionedArticles" />
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-myblu">Articoli pubblicati</h5>
                        <x-articles-table :articles="$acceptedArticles" />
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-myblu">Articoli respinti</h5>
                        <x-articles-table :articles="$rejectedArticles" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>