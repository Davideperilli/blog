<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome tag</th>
            <th scope="col">n articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Elimina</th>
        </tr>
    </thead>
    <tbody>
        @foreach($metaInfos as $metaInfo)
        <tr>
            <th scope="row">{{$metaInfo->id}}</th>
            <td>{{$metaInfo->name}}</td>
            <td>{{count($metaInfo->articles)}}</td>
            @if($metaType=='tags')
            <td>
               <form action="{{route('admin.editTag',['tag'=>$metaInfo])}}" method="POST">
                @csrf
                @method('put')
                <input type="text" name="name" placeholder="Nuovo nome tag" class="form-control w-50 d-inline" >
                <button class="btn-custom my-2" type="submit">Aggiorna</button>
               </form>
            </td>
            <td>
                <form action="{{route('admin.deleteTag', ['tag'=>$metaInfo])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn-custom my-2" type="submit">Elimina</button>
                </form>
            </td>    
            @else
            <td>
                <form action="{{route('admin.editCategory',['category'=>$metaInfo])}}" method="POST">
                 @csrf
                 @method('put')
                 <input type="text" name="name" placeholder="Nuovo nome categoria" class="form-control w-50 d-inline" >
                 <button class="btn-custom my-2" type="submit">Aggiorna</button>
                </form>
             </td>
             <td>
                <form action="{{route('admin.deleteCategory', ['category'=>$metaInfo])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn-custom my-2" type="submit">Elimina</button>
                </form>
            </td>   
            @endif
        </tr>
        @endforeach
       
    </tbody>
</table>