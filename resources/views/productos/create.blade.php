@extends('../layout.plantilla')

@section('navegacion')



@endsection
@section('contenido')
    <div class="col-6 mt-4">
   
        <form enctype="multipart/form-data" action="{{url('/producto')}}" method="post" >
        {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputNombre">Nombre *</label>
                    <input type="text" name="nombre" class="form-control @error('nombre')  is-invalid @enderror" id="inputNombre" placeholder="Nombre del producto">
                    @error('nombre')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPrecio">Precio *</label>
                    <input type="text" name="precio" class="form-control  @error('precio')  is-invalid @enderror" id="inputNombre" placeholder="Precio">
                    @error('precio')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPrecio">Cantidad *</label>
                    <input type="text" name="cantidad" class="form-control @error('cantidad')  is-invalid @enderror" id="inputNombre" placeholder="Existencias del producto">
                    @error('cantidad')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPrecio">seccion *</label>
                    <input type="text" name="seccion" class="form-control @error('seccion')  is-invalid @enderror" id="inputNombre" placeholder="deportes, escolar, oficina">
                    @error('seccion')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputPrecio">Categoria *</label>
                    <input type="text" name="categoria" class="form-control @error('categoria')  is-invalid @enderror" id="inputNombre" placeholder="niña, niño, hombre, mujer, unisex">
                    @error('categoria')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div> 
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputfile">Imagen</label>
                    <input type="file" name="file" class="form-control" id="inputfile" >
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Registrar Producto</button>
                </div>
            </div>
        </form>
    </div>
@endsection

