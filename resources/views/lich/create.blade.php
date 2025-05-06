@extends('layouts.admin')

@section('title')
<title>Đăng ký lịch thực tập</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Intern', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{ route('lich.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Đăng ký lịch thực tập</label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="30%">Ngày</th>
                                        <th width="20%">Thứ</th>
                                        <th width="50%">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($danhSachNgay as $ngay)
                                        <tr>
                                        <td>{{ $ngay['date'] }}</td>
                                        <td>{{ $ngay['day_of_week'] }}</td>
                                            <td>
                                            <select class="form-control" name="trangthai[{{ $ngay['date'] }}]">
                                                    <option value="D-ons">D-ons</option>
                                                    <option value="D-re">D-re</option>
                                                    <option value="M-ons">M-ons</option>
                                                    <option value="M-re">M-re</option>
                                                    <option value="A-ons">A-ons</option>
                                                    <option value="A-re">A-re</option>
                                                    <option value="Off" {{ in_array($ngay['day_of_week'], ['Thứ Bảy', 'Chủ Nhật']) ? 'selected' : '' }}>Off</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Lưu lịch thực tập
                                    </button>
                                    <a href="{{ route('lich.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Hủy
                                    </a>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
