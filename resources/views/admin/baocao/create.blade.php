@extends('layouts.admin')

@section('title')
<title>title</title>
@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="content-wrapper"/>
 
@include('partials.content-header', ['name' => 'Baocao', 'key' => 'Add'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="post">
                        @csrf
                <div class="form-group">
                    <label>Tên báo cáo</label>
                    <input type="text" name="hoten" class="form-control" placeholder="Nhập tên thực tập sinh">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" name="noidung" placeholder="Nhập nội dung báo cáo">
                </div>
                <div class="d-flex justify-content-between mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Lưu báo cáo
                                    </button>
                                    <a href="{{ route('interns.index') }}" class="btn btn-secondary">
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