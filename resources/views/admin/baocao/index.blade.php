
@extends('layouts.admin')

@section('title')
<title>Thêm thực tập sinh</title>
@section('sidebar')
@parent

<p>Thêm thực tập sinh.</p>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ['name' => 'Báo cáo', 'key' => 'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
       <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên báo cáo</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Nhân viên</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Báo cáo về thông tin thực tập sinh</td>
                <td>Nội dung báo cáo về thông tin thực tập sinh</td>
                <td>Hoàng Minh Duy</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Báo cáo về tiến độ thực tập sinh</td>
                <td>Nội dung báo cáo về tiến độ thực tập sinh</td>
                <td>Ngô Thị Mai</td>
            </tr>
        </tbody>
    </table>
        </div>
        <div class="d-flex justify-content-center">
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection