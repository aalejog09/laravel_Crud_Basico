@extends("../layout.plantilla")

@section('navegacion')


@endsection()
@section('contenido')
    <div class="col mt-4">
        @if(count($productos) === 0)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Bienvenido</h4>
            <p>
                Esta aplicacion tiene pre-configurado un archivo seeder para generar los datos de manera automatica 
                gracias a la libreria Faker, solo tiene que colocar en la consola de comandos la siguiente sentencia:
            </p>
            <hr>
            <p class="mb-0">
                php artisan db:seed
            </p>
        </div>
        @else 
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">nombre</th>
                    <th scope="col">precio</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">seccion</th>
                    <th scope="col">categoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                    <td><a href="{{route('producto.show',$producto->id)}}">{{$producto->nombre}}</a></td>
                    <td>${{$producto->precio}}</td>
                    <td>{{$producto->cantidad}}</td>
                    <td>{{$producto->seccion}}</td>
                    <td>{{$producto->categoria}}</td>
                    </tr>
                    @endForeach                
                </tbody>
            </table>
        @endif
    </div>
    <div class="col-12">
        {{$productos->links()}}
    </div>
@endsection