@extends('admin.layout.master')
@section('admin_master')
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



<div class="container">
    <h4 class="mt-4 mb-5 text-center">UPDATE REDEEM CODE</h4>

    <form action="{{route('api_tools_update_package_update_data', ['id' => $id])}}" method="POST" class="mb-5" enctype="multipart/form-data">

        <div class="form-group">
            <label for="">REDEEM CODE</label>
            <input type="text" class="form-control" required name="redeem_code"   placeholder="REDEEM CODE..." />
        </div>

        <div class="form-group">
            <label for="">AMOUNT</label>
            <input type="text" class="form-control" required name="amount"  placeholder="AMOUNT..." />
        </div>

        <div class="row">
            <div class="col-6">
                <a href="{{route('show_dynamic_package')}}" style="width: 100%" class="btn btn-danger">Back</a>
            </div>

            <div class="col-6">
                <button type="submit" style="width: 100%" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>

@endsection
