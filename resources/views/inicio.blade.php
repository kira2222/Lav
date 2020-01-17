@extends('plantilla')

@section('content')
    <div class="row">
        <div class="col-md-7">

            <table class="table">
                <tr>
                    
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>    
                @foreach ($notas as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->Nombre}}</td>
                        <td>{{$item->Descripcion}}</td>
                        <td><a href="{{route('editar',$item->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('eliminar',$item->id)}}" class="btn alert-warning" method="post">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn-danger">Eliminar</button>
                        </form>
                        </td>

                                          
                        
                    </tr>
                @endforeach
                </table>
                @if(session('eliminar'))

                <div class="alert-warning">
                    {{session('Eliminar')}}
                </div>

                @endif
                {{ $notas->links() }}
        </div>
        <div class="col-md-5">

            <h3 class="text-center mb-4">Agregar notas</h3>

        <form action="{{route('agregar')}}" method="POST">
            @csrf

            <div class="from-group">
                <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre de la nota" required>
            </div>
            @error('nombre')
            <div class="alert-warning">
                El nombre es requerido
            </div>
            @enderror

            <div class="from-group">
                <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{old('Descripcion')}}" placeholder="Descripcion de la nota" required>
            </div>

            @error('descripcion')
            <div class="alert-warning">
                la descripcion es requerida
            </div>
            @enderror

            <button type="submit" class="btn btn-success btn-block">Enviar nota</button>
        </form>
        @if(session('agregar'))
        <div class="alert alert-success nt-3">
            {{session('agregar')}}
        </div>
        @endif

        </div>

        



    </div>

@endsection
