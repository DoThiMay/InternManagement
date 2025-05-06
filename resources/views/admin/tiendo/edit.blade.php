@extends('layouts.admin')

@section('title')
<title>title</title>
@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="content-wrapper">
 
@include('partials.content-header', ['name' => 'Tiendo', 'key' => 'Edit'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.tiendo.update', ['id' => $tiendo->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Chọn tiến độ </label>
                                                            <select name="tiendo" class="form-control" value="{{ $tiendo->tiendo }}">
                                                                <option value="todo" >To Do</option>
                                                                <option value="doing" >Doing</option>
                                                                <option value="done">Done</option>
                                                            </select>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Lưu tiến độ
                                    </button>
                                    <a href="{{ route('admin.tiendo.search') }}" class="btn btn-secondary">
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