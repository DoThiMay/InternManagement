@extends('layouts.admin')

@section('title')
<title>title</title>
@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="content-wrapper"/>
 
@include('partials.content-header', ['name' => 'Intern', 'key' => 'Add'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('interns.store') }}" method="post">
                        @csrf
                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" name="hoten" class="form-control" placeholder="Nhập tên thực tập sinh">
                </div>
                <div class="form-group">
                    <label>Thời gian bắt đầu</label>
                    <input type="date" class="form-control" name="tgbatdau">
                </div>
                <div class="form-group">
                    <label>Thời gian kết thúc</label>
                    <input type="date" class="form-control" name="tgketthuc">
                </div>
                <div class="form-group">
                    <label>Chọn vị trí thực tập</label>
                    <select class="form-control" name="vitri">
                        <option>DEV</option>
                        <option>QA</option>
                        <option>BA</option>
                        <option>BrSE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Trường</label>
                    <input type="text" class="form-control" placeholder="Nhập tên trường" name="truong">
                </div>
                <div class="form-group">
                    <label>GPA</label>
                    <input type="number" class="form-control" step="0.01" placeholder="Nhập GPA" name="gpa">
                </div>
                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="ngaysinh">
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="sdt">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Nhập email" name="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Nhập password" name="password">
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