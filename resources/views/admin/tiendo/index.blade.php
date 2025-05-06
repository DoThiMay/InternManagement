@extends('layouts.admin')

@section('title')
<title>Tiến độ thực tập</title>
<style>
    .custom-thead {
        background-color: gray; /* chọn màu tại đây */
        color: white;
    }
</style>

@endsection

@section('sidebar')
@parent
<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Tiendo', 'key' => 'Add'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Bộ lọc vị trí -->
                <div class="col-md-12 mb-3">
                    <form method="GET" action="{{ route('admin.tiendo.index') }}" class="form-inline">
                        <label for="vitri" class="mr-2 font-weight-bold">Chọn vị trí:</label>
                        <select name="vitri" onchange="this.form.submit()" class="form-control mr-3">
                            <option value="">-- Tất cả --</option>
                            <option value="dev" {{ $vitri == 'dev' ? 'selected' : '' }}>Dev</option>
                            <option value="ba" {{ $vitri == 'ba' ? 'selected' : '' }}>BA</option>
                            <option value="tester" {{ $vitri == 'tester' ? 'selected' : '' }}>Tester</option>
                            <option value="brse" {{ $vitri == 'brse' ? 'selected' : '' }}>BrSE</option>
                        </select>
                    </form>
                </div>

                <!-- Bảng cập nhật tiến độ -->
                <div class="col-md-12">
                @if($programs->count() && $interns->count())
<div class="table-responsive">
    <table class="table table-bordered text-center align-middle">
        <thead class="custom-thead">
            <tr>
                <th class="align-middle">Tên thực tập sinh</th>
                <th class="align-middle">Hiệu suất</th>
                @foreach ($programs as $program)
                    <th class="align-middle">{{ $program->mon }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($interns as $intern)
                <tr>
                    <td class="align-middle font-weight-bold">{{ $intern->hoten }}</td>
                    <td class="align-middle text-success font-weight-bold">15%</td>
                    @foreach ($programs as $program)
                        <td>
                            {{ ucfirst($tiendos[$intern->id][$program->id] ?? 'Chưa có') }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-info">Vui lòng chọn vị trí để xem tiến độ.</div>
@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
