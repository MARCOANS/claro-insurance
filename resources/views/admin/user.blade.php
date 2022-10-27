@extends('layouts.dashboard')

@section('content')

<div class="d-flex justify-content-between my-5">
    <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#modal-create">Registar nuevo
        usuario</button>
</div>

<x-admin.user.modal-create :countries="$countries" />

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usarios</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Nombre</th>
                        <th> Email</th>
                        <th> Celular</th>
                        <th> Cedula</th>
                        <th> F nacimiento</th>
                        <th> Ciudad</th>
                        <th> Rol</th>

                        <th>Edad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('assets/js/admin/user/create.js') }}"></script>



<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {
  
      var table = $('#dataTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "users/get-all",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           

             {data:'name' , name:'name'},
             {data:'email' , name:'email'},
                                       {data:'cellphone' , name:'cellphone'},
                                       {data:'identification_card' , name:'identification_card'},
                                       {data:'birthday' , name:'birthday'},
                                       {data:'city.name' , name:'city_id'},
                                       {data:'role.name' , name:'role_id'},
                                      
                                       {data:'age' , name:'Edad'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true
              },
          ]
      });

      window.table = table
  
    });
</script>

@endpush