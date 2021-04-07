@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
              <div>

            @if(isPermission('write'))    
                <button class="btn btn-primary btn-sm float-sm-right" style="background:white; border-radius:22px;">
                  <a href=" {{ url('add_user')}} ">
                   <i class="fas fa-plus"></i> Add User
                  </a>
                </button>
             @endif

                 </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="usertable" class="table table-bordered table-striped">

                  <thead>

                      <tr>
                     <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Images</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  
                  <tbody>   
                
                   
                  

                    </td>
                  </tbody>
                  


                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      </div>


    </section>
    <!-- /.content -->
  </div>

@endsection


@section('footer_script')
<script type="text/javascript">

     activeProjectDatatable = $('#usertable').DataTable({
        "language": {
            "processing": ''
        },
        "pagingType": "full_numbers",
          "searching": true,
        "ordering": true,//disable sorting
        "dom": "Blfrtip",//hide pagination
        "bLengthChange": false,//length info
        "bFilter": true,//hide search filter
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": 'user-list',
            "type": "POST",
            'beforeSend': function (request) {
                //Set csrf token
                request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
            },
            "error": function (xhr, error, thrown) {
                //#### common function for handling error #####
            }
        },
        "initComplete": function (settings, json) {
            //##### Set Filter Date on first time initialization #####
        },
        //Set Class name to td
        "columns": [null, null,null,null, null, {className: "td-actions"}, null],        
    });
     
     $(document).on('click','.delete-data',function(){
        //$(this).attr('data-id');
        var id = $(this).data('id');
       swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it!',
                buttonsStyling: false
            }).then(function() {



         
    })
})
    
</script>
@endsection
