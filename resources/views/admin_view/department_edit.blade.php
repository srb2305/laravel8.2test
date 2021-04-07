@extends('layouts.admin.app')

@section('internal_css')    
  <style type="text/css">
  .error{
    color:red;
  }
</style>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Department</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Department</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('department_update')}}" method="post">
                 @csrf
                <input type="hidden" name="id" value="{{ $result->id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{ $result->name}}">
                  </div>
              
                
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="add_user" class="btn btn-block btn-primary ">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         
        </div>  
      </div>
    </div>
  </div>
</section>
</div>
@endsection

