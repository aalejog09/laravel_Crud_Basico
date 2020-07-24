@extends('../layout.plantilla')

@section('navegacion')

@endsection

@section('contenido')

    <div class="col-6 mt-4">
        <form enctype="multipart/form-data" action="{{url('/producto/'.$producto->id)}}" method="post" >
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputNombre">Nombre *</label>
                    <input type="text" value="{{$producto->nombre}}" name="nombre" class="form-control  @error('nombre')  is-invalid @enderror" id="inputNombre" placeholder="Nombre del producto">
                    @error('nombre')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPrecio">Precio *</label>
                    <input type="text" value="{{$producto->precio}}" name="precio" class="form-control  @error('precio')  is-invalid @enderror" id="inputNombre" placeholder="Precio">
                    @error('precio')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPrecio">Cantidad *</label>
                    <input type="text" value="{{$producto->cantidad}}" name="cantidad" class="form-control @error('cantidad')  is-invalid @enderror" id="inputNombre" placeholder="Existencias del producto">
                    @error('cantidad')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPrecio">seccion *</label>
                    <input type="text" value="{{$producto->seccion}}" name="seccion" class="form-control  @error('seccion')  is-invalid @enderror" id="inputNombre" placeholder="deportes, escolar, oficina">
                    @error('seccion')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPrecio">Categoria *</label>
                    <input type="text" value="{{$producto->categoria}}" name="categoria" class="form-control @error('categoria')  is-invalid @enderror" id="inputNombre" placeholder="niña, niño, hombre, mujer, unisex">
                    @error('categoria')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputfile">Imagen</label>
                    <input type="file" name="file" class="form-control" id="inputfile" value="{{$producto->ruta}}">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                </div>
            </div>
        </form>
        <form action="{{url('/producto/'.$producto->id)}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
            <div class="form-row mt-2">
               <div class="col">
                    <input class="btn btn-danger" type="submit" value="Borrar registro">
               </div>
            </div>
        </form>
    </div>


@endsection