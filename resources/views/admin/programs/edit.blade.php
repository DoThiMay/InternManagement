@extends('layouts.admin')

@section('title')
<title>title</title>
@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="content-wrapper">
 
@include('partials.content-header', ['name' => 'Program', 'key' => 'Edit'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('programs.update', ['id' => $programs->id]) }}" method="post">
                        @csrf
                        <form>
                <div class="form-group">
                    <label>Ngày</label>
                    <input type="number" name="ngay" class="form-control" placeholder="Nhập ngay" 
                    value="{{ $programs->ngay }}">
                </div>
                <div class="form-group">
                    <label>Buổi</label>
                    <input type="number" name="buoi" class="form-control" placeholder="Nhập buổi"
                     value="{{ $programs->buoi }}">
                </div>
                <div class="form-group">
                    <label>Chọn vị trí</label>
                    <select class="form-control" name="vitri"
                     value="{{ $programs->vitri }}">
                        <option>DEV</option>
                        <option>QA</option>
                        <option>BA</option>
                        <option>BrSE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Môn</label>
                    <input type="text" class="form-control" name="mon"
                     value="{{ $programs->mon }}">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" name="noidung"
                     value="{{ $programs->noidung }}">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" class="form-control" placeholder="Nhập mô tả" name="mota"
                     value="{{ $programs->mota }}" >
                </div>
                <div class="form-group">
                    <label>Số giờ học</label>
                    <input type="text" class="form-control" placeholder="Nhập giờ học" name="sogiohoc"
                     value="{{ $programs->sogiohoc }}" >
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