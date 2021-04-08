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
            <h1>User Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Update</li>
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
                <h3 class="card-title">User Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="user_form" action="{{url('user_upadate')}}" method="post">
               @csrf
                <input type="hidden" name="id" value="{{ $result->id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{ $result->name}}">
                  </div>
              
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $result->email}}">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Position</label>
                    <select name="position" class="form-control" >
                      <option>Select Position</option>
                      @foreach($position as $key => $val)
                      <option value="{{$key}}"  {{ $key == $result->position ? 'selected=""' : '' }}>{{$val}}</option>
                      @endforeach    
                    </select>
                  </div>


                    @php
                    $depary =   !empty($result->department_id) ? json_decode($result->department_id) : [];
                    @endphp
                  <div class="form-group">
                    <label for="exampleInputPassword1">Department</label>
                    <select multiple name="department_id[]" class="form-control" >
                      <option >Select Department</option>
                      @foreach($department as $key => $val)
                      <option value="{{$key}}"  {{ in_array($key,$depary) ? 'selected=""' : '' }}>{{$val}}</option>
                      @endforeach    
                    </select>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="add_user" class="btn btn-block btn-primary">update</button>
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

@section('footer_script')

@endsection
