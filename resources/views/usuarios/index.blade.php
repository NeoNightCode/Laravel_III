@extends('layouts.app')

@section("contenido")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{route('usuarios.restaurar')}}" class="btn btn-success mb-3">Restaurar</a>
            </div>
        </div>
        <table id="tabla" class="table table-striped table-bordered">
           <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha Nacimiento</th>
                    <th>Edad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr data-id='{{$usuario->id}}'>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellidos}}</td>
                    <td>{{date('d-m-Y', strtotime($usuario->f_nacimiento))}}</td>
                    <td>{{$usuario->edad}}</td>
                    <td><img class="imagenes borrar" src="{{ URL::to('/assets/img/borrar.png') }}"></td>
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
                { orderable: false, targets: [0,2,3,4] }
            ],
        });


        $("#tabla").on("click",".borrar",function(e){
            e.preventDefault();
           
            //confirmar con sweetalert
            Swal.fire({
                title: '¿Estas seguro?',
                text: "El usuario sera borrado de la base de datos",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'No, cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const tr=$(this).closest("tr");
                    const id=tr.data("id");
                    $.ajax({
                        url: "{{url('/usuarios/delete')}}/"+id,
                        method: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(){
                            tr.fadeOut();
                        }
                    })
                }
            })    
        });
    });



</script>

@endsection