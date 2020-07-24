<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos= producto::paginate(5);

        

        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['nombre'=>'required','precio'=>'required','cantidad'=>'required','seccion'=>'required','categoria'=>'required']);
        
        /*$producto= new producto;
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->cantidad=$request->cantidad;
        $producto->seccion=$request->seccion;
        $producto->categoria=$request->categoria;
        $producto->save();*/

        $entrada=$request->all();

        if($archivo=$request->file('file')){

                $nombre=$archivo->getClientOriginalName();
                $archivo->move('images',$nombre);
                $entrada['ruta']=$nombre;
        }

        producto::create($entrada);


       return redirect('/producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto= producto::findOrFail($id);

        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $producto= producto::findOrFail($id);

        return view('productos.edit', compact('producto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['nombre'=>'required','precio'=>'required','cantidad'=>'required','seccion'=>'required','categoria'=>'required']);
        
        $producto=producto::findOrFail($id);

       if ($producto->ruta === null ) {
            if($request->hasfile('file')){  
                
                $archivoFoto=$request->file('file');
                $nombreFoto=time().$archivoFoto->getClientOriginalName(); 
                $archivoFoto->move(public_path().'/images', $nombreFoto);

                $producto->ruta=$nombreFoto; 
            }

            $producto->update($request->all());

            return redirect('/producto/'.$id);

       }elseif($producto->ruta <> null and $request->hasfile('file') === false){

            $producto->update($request->all());

            return redirect('/producto/'.$id);

       }else{
            $image_path = public_path().'/images/'.$producto->ruta;
            unlink($image_path);

            if($request->hasfile('file')){
            
                $archivoFoto=$request->file('file');
                $nombreFoto=time().$archivoFoto->getClientOriginalName(); 
                $archivoFoto->move(public_path().'/images', $nombreFoto);

                $producto->ruta=$nombreFoto; 
            }

            $producto->update($request->all());
            return redirect('/producto/'.$id);
       }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=producto::findOrFail($id);
       
       if ($producto->ruta === null) {
            
            $producto->delete();  

       }else{

            $image_path = public_path().'/images/'.$producto->ruta;
            unlink($image_path);
       }
       
       return redirect('/producto');
    }

    
}
