
@extends('layouts.admin')

@section('title')
<title>Lịch đăng ký</title>
@section('sidebar')
@parent

<p>Lịch đăng ký</p>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials.content-header', ['name' => 'Lich', 'key' => 'List'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <form action="{{ route('admin.lich.search') }}" method="GET" class="form-inline mb-3">
        <input type="text" name="keyword" class="form-control mr-2" placeholder="Tìm theo tên intern..." value="{{ request('keyword') }}">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
        </div>
        <div class="col-md-12">
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>Họ tên</th>
            <th>Ngày</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($lichs as $lich)
            <tr>
                <td>{{ $lich->hoten }}</td>
                <td>{{ \Carbon\Carbon::parse($lich->ngay)->format('d/m/Y') }}</td>
                <td>{{ $lich->trangthai }}</td>
                <td><a href="{{ route('admin.lich.edit', ['id' => $lich->id]) }}" class="btn btn-sm btn-info">Edit</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Không tìm thấy kết quả.</td>
            </tr>
        @endforelse
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