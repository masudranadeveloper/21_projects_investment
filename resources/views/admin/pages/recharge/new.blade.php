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
        <i class="fa fa-table"></i> DATA TABLE
    </div>

    @if ($user_account -> count() > 0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Images</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>TranxID</th>
                            <th>User Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user_account as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>
                                    <a href="{{asset('images/deposit/'.$item['img'])}}" target="_blank" rel="noopener noreferrer">
                                        <img style="height: 4rem;width:4rem" src="{{asset('images/deposit/'.$item['img'])}}" alt="{{$item['img']}}">
                                    </a>
                                </td>
                                <td>{{$item['amount']}}</td>
                                <td>{{$item['method']}}</td>
                                <td>{{$item['tranx']}}</td>
                                <td>
                                    @if($item['online_time'] > time())
                                        <span class="btn btn-success">Online</span>
                                    @else
                                        <span class="btn btn-danger">Ofline</span>
                                    @endif
                                </td>
                                <td>
                                    <a onclick="return confirm('You want to reject this item??')" href="{{route('api_deposit_rejected', ['id' => $item['id']])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    <a onclick="return confirm('You want to accept this item??')" href="{{route('api_deposit_success', ['id' => $item['id']])}}" class="btn btn-success"><i class="fa-solid fa-square-check"></i></a>
                                    <a href="{{route('show_users_profile', ['id' => $item['userID']])}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
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
