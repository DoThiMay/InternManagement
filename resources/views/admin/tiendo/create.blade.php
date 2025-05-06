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
                    <form method="GET" action="{{ route('admin.tiendo.create') }}" class="form-inline">
                        <label for="vitri" class="mr-2 font-weight-bold">Chọn vị trí:</label>
                        <select name="vitri" onchange="this.form.submit()" class="form-control mr-3">
                            <option value="">-- Tất cả --</option>
                            <option value="dev" {{ $vitri == 'dev' ? 'selected' : '' }}>Dev</option>
                            <option value="ba" {{ $vitri == 'ba' ? 'selected' : '' }}>BA</option>
                            <option value="tester" {{ $vitri == 'tester' ? 'selected' : '' }}>Tester</option>
                        </select>
                    </form>
                </div>

                <!-- Bảng cập nhật tiến độ -->
                <div class="col-md-12">
                    @if($programs->count() && $interns->count())
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Cập nhật tiến độ thực tập sinh</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.tiendo.store') }}" method="POST" onsubmit="return confirmUpdate()">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped text-center align-middle">
                                    <thead class="custom-thead">
                                            <tr>
                                                <th class="align-middle">Tên thực tập sinh</th>
                                                @foreach ($programs as $program)
                                                    <th class="align-middle">{{ $program->mon }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($interns as $intern)
                                                <tr>
                                                    <td class="align-middle font-weight-bold">{{ $intern->hoten }}</td>
                                                    @foreach ($programs as $program)
                                                        <td>
                                                            <select name="tiendos[{{ $intern->id }}][{{ $program->id }}]" class="form-control">
                                                                <option value="todo" {{ ($tiendos[$intern->id][$program->id] ?? '') == 'todo' ? 'selected' : '' }}>To Do</option>
                                                                <option value="doing" {{ ($tiendos[$intern->id][$program->id] ?? '') == 'doing' ? 'selected' : '' }}>Doing</option>
                                                                <option value="done" {{ ($tiendos[$intern->id][$program->id] ?? '') == 'done' ? 'selected' : '' }}>Done</option>
                                                            </select>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            <script>
                                                function confirmUpdate() {
                                                return confirm("Bạn có chắc chắn muốn cập nhật tiến độ không?");
                                            }
                                            </script>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">Cập nhật tiến độ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @else
                        <div class="alert alert-info w-100">Vui lòng chọn vị trí để hiển thị chương trình và thực tập sinh.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
