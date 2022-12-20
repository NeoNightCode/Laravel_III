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
        $('#tabla').DataTable( {
            "language": {
                "lengthMenu": "Mostrar _MENU_ usuarios por página",
                "zeroRecords": "No se han encontrado usuarios - Contacto con el soporte",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "search": "Buscar",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado por _MAX_ registros)",
                "paginate": {
                    'next': "Siguiente",
                    'previous': "Anterior",
                }
            },
            columnDefs: [
                { orderable: false, targets: [0,1,2] }
            ],
        });
    });
</script>

@endsection