
@extends('layouts.admin')

@section('title')
<title>Thêm Chương trình học</title>
@section('sidebar')
@parent

<p>Thêm thực tập sinh.</p>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ['name' => 'Program', 'key' => 'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
        <div class="col-md-12 mb-3">
        <form action="{{ route('programs.index') }}" method="GET" class="form-inline">
        <label for="vitri" class="mr-2">Lọc theo vị trí:</label>
        <select name="vitri" id="vitri" class="form-control mr-2" onchange="this.form.submit()">
            <option value="">-- Tất cả --</option>
            <option value="dev" {{ request('vitri') == 'dev' ? 'selected' : '' }}>Dev</option>
            <option value="tester" {{ request('vitri') == 'tester' ? 'selected' : '' }}>Tester</option>
            <option value="qa" {{ request('vitri') == 'qa' ? 'selected' : '' }}>QA</option>
            <option value="ba" {{ request('vitri') == 'ba' ? 'selected' : '' }}>BA</option>
        <!-- Thêm các vị trí khác tùy theo dữ liệu của bạn -->
        </select>
        </form>
        </div>
       <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Ngày</th>
                <th scope="col">Buổi</th>
                <th scope="col">Môn</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Số giờ học</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($programs as $program)
            <tr>
                <td>{{ $program->ngay }}</td>
                <td>{{ $program->buoi }}</td>
                <td>{{ $program->mon }}</td>
                <td>{{ $program->noidung }}</td>
                <td>{{ $program->mota }}</td>
                <td>{{ $program->sogiohoc }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $programs->links('pagination::bootstrap-4') }}
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection