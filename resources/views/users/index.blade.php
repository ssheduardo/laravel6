@extends('adminlte::page')
@section('title', 'Dashboard')
@section('plugins.Datatables', true)

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Users Management</h3>
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
        <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"> Create New User</a>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered" id="users_table">
      <thead>
       <tr>
         <th>No</th>
         <th>Name</th>
         <th>Email</th>
         <th>Roles</th>
         <th>Action</th>
       </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<p class="text-center text-primary"><small>izoolz.com</small></p>
@endsection

@section('js')
    <script> 
        $(document).ready( function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
              $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                ajax: {
                    url: "{{ route('users.index') }}",
                },
                columns: [
                    { name: 'id', data: 'id' },
                    { name: 'name', data: 'name', className: 'text-uppercase' },
                    { name: 'email', data: 'email' },
                    { name: 'roles', data: 'roles' },
                    { name: 'action', data: 'action' },
                ],
            });
          } );
    </script>
@stop


















