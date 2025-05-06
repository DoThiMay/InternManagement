@extends('layouts.admin')

@section('title')
<title>Lịch đăng ký</title>
@endsection

@section('sidebar')
@parent
<p>Lịch đăng ký</p>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header -->
  @include('partials.content-header', ['name' => 'Tiến độ', 'key' => 'Tìm kiếm'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <!-- Search Form -->
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card shadow-sm">
            <div class="card-body">
              <form method="GET" action="{{ route('admin.tiendo.search') }}" class="d-flex flex-wrap align-items-center gap-3">
                <input type="text" name="keyword" class="form-control" placeholder="Tìm theo tên, chương trình..." value="{{ $keyword ?? '' }}" style="max-width: 250px;">

                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-search me-1"></i> Tìm kiếm
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Results Table -->
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Kết quả tìm kiếm</h5>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Họ tên</th>
                    <th>Vị trí</th>
                    <th>Tên chương trình</th>
                    <th>Tiến độ</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($tiendos as $tiendo)
                    <tr>
                      <td>{{ $tiendo->hoten }}</td>
                      <td>{{ $tiendo->vitri }}</td>
                      <td>{{ $tiendo->tenchuongtrinh }}</td>
                      <td>{{ $tiendo->tiendo }}</td>
                      <td>
                        <a href="{{ route('admin.tiendo.edit', ['id' => $tiendo->id]) }}">
                          <i class="fas fa-edit"></i> Sửa
                        </a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="4">Không có dữ liệu phù hợp</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>

              <!-- Pagination -->
              <div class="d-flex justify-content-center mt-3">
                {{ $tiendos->appends(request()->query())->links('pagination::bootstrap-4') }}
              </div>

            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</div>
@endsection
