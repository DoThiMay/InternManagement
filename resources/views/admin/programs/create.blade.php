@extends('layouts.admin')

@section('title')
<title>title</title>
@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="content-wrapper">
 
@include('partials.content-header', ['name' => 'Program', 'key' => 'Add'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('programs.store') }}" method="post">
                        @csrf
                        <form>
                <div class="form-group">
                    <label>Ngày</label>
                    <input type="number" name="ngay" class="form-control" placeholder="Nhập ngay">
                </div>
                <div class="form-group">
                    <label>Buổi</label>
                    <input type="number" name="buoi" class="form-control" placeholder="Nhập buổi">
                </div>
                <div class="form-group">
                    <label>Chọn vị trí</label>
                    <select class="form-control" name="vitri">
                        <option>DEV</option>
                        <option>QA</option>
                        <option>BA</option>
                        <option>BrSE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Môn</label>
                    <input type="text" class="form-control" name="mon">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" name="noidung">
                </div>
                <div class="form-group">
                    <label>Số giờ học</label>
                    <input type="number" step="0.1" class="form-control" name="sogiohoc">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" class="form-control" placeholder="Nhập mô tả" name="mota">
                </div>
                <div class="d-flex justify-content-between mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Lưu chương trình
                                    </button>
                                    <a href="{{ route('programs.index') }}" class="btn btn-secondary">
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