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
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Account</th>
                            <th>Tax</th>
                            <th>User Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = ($user_account->currentPage() - 1) * $user_account->perPage() + 1 @endphp
                        @foreach ($user_account as $item)
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$item['amount']}}</td>
                                <td>{{$item['Method']}}</td>
                                <td>{{$item['Address']}}</td>
                                <td>{{$item['Tax']}}</td>
                                <td>
                                    @if($item['online_time'] > time())
                                        <span class="btn btn-success">Online</span>
                                    @else
                                        <span class="btn btn-danger">Ofline</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('api_withdraw_undo', ['id' => $item['id']])}}" class="btn btn-success"><i class="fa-solid fa-arrow-rotate-left"></i></i></a>
                                    <a href="{{route('show_users_profile', ['id' => $item['userID']])}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                            @php $counter++ @endphp
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
