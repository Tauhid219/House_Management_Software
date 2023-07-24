@include('adminltelayouts.header');

@include('adminltelayouts.menu');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Overview of House Rental Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tenants</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h2 class="m-0">Tenants-list</h2>
                    {{-- <strong> {{ session()->get('msg') }}</strong> --}}
                    @if ($message = Session::get('msg'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                </div>
                <div class="card-body">
                    <!-- {{-- <h6 class="card-title"></h6>

                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a> --}} -->

                    <h4 class="pull-right" style="margin-left: 90%"> <a href="{{route('tenant.create')}}">
                      <button class="btn btn-warning"> <i class="fa fa-plus-circle">&nbsp; Create</i></button></a></h4>
                <div class="col-md-12">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>NID</th>
                        <th>Occupation</th>
                        <th>Per.Address</th>
                        <th>Move_in</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($ten_list as $ten=>$l )
                      <tr>
                        <td>{{$ten+1}}</td>
                        <td>{{$l->name}}</td>
                        <td>{{$l->gender}}</td>
                        <td>{{$l->phn_no}}</td>
                        <td>{{$l->email}}</td>
                        <td>{{$l->nid}}</td>
                        <td>{{$l->occupation}}</td>
                        <td>{{$l->per_address}}</td>
                        <td>{{$l->move_in}}</td>
                        <td><img src="/uploads/{{ $l->photo}}" width="120px"></td>
                        <td>{{$l->status}}</td>

                        <td>
                            <form action="{{ route('tenant.destroy',$l->id) }}" method="POST">
                 
                            
                  
                                <a class="btn btn-primary" href="{{ route('tenant.edit',$l->id) }}"><i class="fa fa-edit"></i></a>
                 
                                @csrf
                                @method('DELETE')
                    
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    
                    
                    </tbody>
                  </table>
         
                  {!! $ten_list->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

@include('adminltelayouts.footer');