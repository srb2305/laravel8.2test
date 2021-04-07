@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permission List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permission List</li>
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
                <h3 class="card-title">Permission List</h3>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="usertable" class="table table-bordered table-striped">

                  <thead>

                      <tr>
                     
                    <th>Name</th>
                    <th>Read</th>
                    <th>Write</th>
                    <th>Update</th>
                    <th>Delete</th>
                    
                  </tr>
                  </thead>
                  <form action="{{ url('permission') }}" method="post">
                    @csrf
                  <tbody>   
                 
                    @php  $i = 0; @endphp
              @foreach($data as$k=>$v)    
                  <tr>
                    <td><div class="form-check">
                    <h1>
                      @if($v->position_id == 1)
                      Admin
                      @elseif($v->position_id == 2)
                      Manager
                      @else
                      User
                      @endif

                    </h1>
                    <label class="form-check-label" for="remember">
                   </label>
                 </div>
               </td>
                    <td>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="read[{{$i}}]" id="remember"  {{ ( $v->read == 1 ) ? 'checked=""' : '' }} >  
                    <label class="form-check-label" for="remember">
                    </label>
                 </div>
               </td>
               <td>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="write[{{$i}}]" id="remember"  {{ ( $v->write == 1 ) ? 'checked=""' : '' }}>
                    <label class="form-check-label" for="remember">
                    </label>
                 </div>
               </td>
                    <td>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="update[{{$i}}]" id="remember"  {{ ( $v->update == 1 ) ? 'checked=""' : '' }}>
                    <label class="form-check-label" for="remember">
                    </label>
                 </div>
               </td>
                    <td>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="delete[{{$i}}]" id="remember"  {{ ( $v->delete == 1 ) ? 'checked=""' : '' }}>
                    <label class="form-check-label" for="remember">
                      </label>
                 </div>
               </td>
                  </tr>
                  @php $i++;  @endphp
            @endforeach      
                  <tr>
                    <td colspan="5">
                  <div class="card-footer">
                  <button type="submit" id="add_user" class="btn btn-block btn-primary ">Submit</button>
                </div>
                </td>
              </tr>
                  </tbody>
                  
                  </form>

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



