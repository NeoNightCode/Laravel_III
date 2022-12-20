@extends('layouts.app')

@section("contenido")
    <div class="container">
        <table id="tabla" class="table table-striped table-bordered">
           <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr data-id='{{$usuario->id}}'>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellidos}}</td>
                    <td>{{date('d-m-Y', strtotime($usuario->f_nacimiento))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<script>
    $(document).ready(function () {
        $('#tabla-pilotos').DataTable( {
        columnDefs: [
            { orderable: false, targets: [0,3,4,5,6,7,8] }
        ],
        });
    });
</script>

@endsection