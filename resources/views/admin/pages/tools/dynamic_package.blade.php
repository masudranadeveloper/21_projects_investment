@extends('admin.layout.master')
@section('admin_master')
<!-- Example DataTables Card-->
<div class="container">
    <div class="row">
        @if (session() -> has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <span>
            <i class="fa fa-table"></i>
            <span>DATA TABLE</span>
        </span>
        <a href="{{route('show_dynamic_package_add')}}" class="btn btn-success float-right">Add New</a>
    </div>

    @if ($user_account -> count() > 0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>CODE</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user_account as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['amount']}}</td>
                                <td>{{$item['redeem_code']}}</td>
                                <td>
                                    <a onclick="return confirm('You want to delete this item??')" href="{{route('api_tools_update_package_delete', ['id' => $item['id']])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>

                                    <a href="{{route('show_dynamic_package_update', ['id' => $item['id']])}}" class="btn btn-primary"><i class="fa-solid fa-pen-nib"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h4 class="text-center">No Data Found!</h4>
    @endif

    {{$user_account -> onEachSide(0)->links()}}
</div>
<!-- /.container-fluid-->

@endsection
