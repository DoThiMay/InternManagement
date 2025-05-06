@extends('layouts.admin')

@section('title')
<title>title</title>
@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="content-wrapper">
 
@include('partials.content-header', ['name' => 'intern', 'key' => 'Edit'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.lich.update', ['id' => $lich->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Chọn vị trí trạng thái</label>
                            <select class="form-control" name="trangthai" value="{{ $lich->trangthai }}">
                                                    <option value="D-ons">D-ons</option>
                                                    <option value="D-re">D-re</option>
                                                    <option value="M-ons">M-ons</option>
                                                    <option value="M-re">M-re</option>
                                                    <option value="A-ons">A-ons</option>
                                                    <option value="A-re">A-re</option>
                                                    <option value="Off">Off</option>
                                                </select>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Lưu lịch thực tập
                                    </button>
                                    <a href="{{ route('admin.lich.search') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Hủy
                                    </a>
                                </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection