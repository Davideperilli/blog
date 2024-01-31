<x-layout>

    <div class="container">
        <div class="row justify-content-center my-5">
            <h1 class="display-1 text-center text-mybrown h1-media">Dashboard <span class="text-myblu">Amministratore</span> </h1>
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
                        <h5 class="text-myblu">Richiesta per ruolo amministratore</h5>
                        <x-request-table :roleRequest="$adminRequests" role="amministratore"/>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-myblu">Richiesta per ruolo revisore</h5>
                        <x-request-table :roleRequest="$revisorRequests" role="revisore"/>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-myblu">Richiesta per scrittore</h5>
                        <x-request-table :roleRequest="$writerRequests" role="redattore"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row my-2 ">
                <div class="col-12">
                    <h2>I tags della piattaforma</h2>
                    <x-metainfo-table :metaInfos="$tags" metaType="tags"></x-metainfo-table>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2>Le categorie della piattaforma</h2>
                    <x-metainfo-table :metaInfos="$categories" metaType="categorie"></x-metainfo-table>
                <form class="d-flex" action="{{route('admin.storeCategory')}}" method="POST">
                    @csrf 
                    <input type="text" name="name" class="form-control" placeholder="Inserisci una nuova categoria">
                    <button type="submit" class="btn-custom mx-1 ">Aggiungi</button>
                </form>
                
                </div>
            </div>
        </div>

    </div>
    
</x-layout>