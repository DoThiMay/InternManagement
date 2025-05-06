
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
          <a href="{{ route('lich.create') }}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
       <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Ngày</nav></th>
                <th scope="col">Thứ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($lichs as $lich)
            <tr>
                <td>{{ $lich->ngay }}</td>
                <td>{{ \Carbon\Carbon::parse($lich->ngay)->locale('vi')->isoFormat('dddd') }}</td>
                <td>{{ $lich->trangthai }}</td>
                <td>
                  <a href="{{ route('lich.edit', ['id' => $lich->id]) }}" class="btn btn-default">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        <div class="d-flex justify-content-center">
    {{ $lichs->links('pagination::bootstrap-4') }}
</div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection