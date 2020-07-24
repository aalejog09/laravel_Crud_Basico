@extends("../layout.plantilla")

@section('navegacion')


@endsection()
@section('contenido')
    <div class="col mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">nombre</th>
                <th scope="col">precio</th>
                <th scope="col">cantidad</th>
                <th scope="col">seccion</th>
                <th scope="col">categoria</th>
                <th scope="col">imagen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><a href="{{route('producto.edit',$producto->id)}}">{{$producto->nombre}}</a></td>
                <td>${{$producto->precio}}</td>
                <td>{{$producto->cantidad}}</td>
                <td>{{$producto->seccion}}</td>
                <td>{{$producto->categoria}}</td>
                @if(!$producto->ruta == null)
                    <td><img src="{{asset('images/'.$producto->ruta)}}" alt="" width="150px"> </td>
                @else
                <td><img src="{{asset('images/pordefecto.jpg')}}" alt="" width="150px"> </td>
                @endif
                </tr>
                         
            </tbody>
        </table>
    </div>
@endsection