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
                    <form action="{{ route('interns.update', ['id' => $intern->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="hoten" class="form-control" 
                            placeholder="Nhập tên thực tập sinh"
                            value="{{ $intern->hoten }}">
                        </div>
                        <div class="form-group">
                            <label>Thời gian bắt đầu</label>
                            <input type="date" class="form-control" name="tgbatdau"
                            value="{{ $intern->tgbatdau }}">
                        </div>
                        <div class="form-group">
                            <label>Thời gian kết thúc</label>
                            <input type="date" class="form-control" name="tgketthuc"
                            value="{{ $intern->tgketthuc }}">
                        </div>
                        <div class="form-group">
                            <label>Chọn vị trí thực tập</label>
                            <select class="form-control" name="vitri"
                            value="{{ $intern->vitri }}">
                                <option>DEV</option>
                                <option>QA</option>
                                <option>BA</option>
                                <option>BrSE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trường</label>
                            <input type="text" class="form-control" placeholder="Nhập tên trường" name="truong"
                            value="{{ $intern->truong }}">
                        </div>
                        <div class="form-group">
                            <label>GPA</label>
                            <input type="number" class="form-control" step="0.01" placeholder="Nhập GPA" name="gpa"
                            value="{{ $intern->gpa }}">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" class="form-control" name="ngaysinh"
                            value="{{ $intern->ngaysinh }}">
                        </div>
                        <div class="form-group">
                            <label>SĐT</label>
                            <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="sdt"
                            value="{{ $intern->sdt }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Nhập email" name="email"
                            value="{{ $intern->email }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Nhập password" name="password"
                            value="{{ $intern->password }}">
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Lưu thực tập sinh
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