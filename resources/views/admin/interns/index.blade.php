
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
  @include('partials.content-header', ['name' => 'Intern', 'key' => 'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('interns.create') }}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
       <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Họ tên</th>
                <th scope="col">Thời gian bắt đầu</th>
                <th scope="col">Thời gian kết thúc</th>
                <th scope="col">Vị trí</th>
                <th scope="col">Trường</th>
                <th scope="col">GPA</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">SĐT</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($interns as $intern)
            <tr>
                <td>{{ $intern->hoten }}</td>
                <td>{{ $intern->tgbatdau }}</td>
                <td>{{ $intern->tgketthuc }}</td>
                <td>{{ $intern->vitri }}</td>
                <td>{{ $intern->truong }}</td>
                <td>{{ $intern->gpa }}</td>
                <td>{{ $intern->ngaysinh }}</t>
                <td>{{ $intern->sdt }}</td>
                <td>{{ $intern->email }}</td>
                <td>
                  <a href="{{ route('interns.edit', ['id' => $intern->id]) }}" class="btn btn-default">Edit</a>
                  <a href="{{ route('interns.delete', ['id' => $intern->id]) }}"
     class="btn btn-danger"
     onclick="return confirm('Bạn có chắc chắn muốn xóa thực tập sinh này không?');">
     Delete
  </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $interns->links('pagination::bootstrap-4') }}
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection