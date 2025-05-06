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
  @include('partials.content-header', ['name' => 'Lịch', 'key' => 'List'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle shadow-sm rounded">
              <thead class="thead-light bg-primary text-white">
                <tr>
                  <th class="align-middle" style="width: 180px;">Họ tên</th>
                  @foreach ($dates as $date)
                    @php
                      $isWeekend = in_array($date->dayOfWeek, [6, 0]); // Thứ 7 - CN
                    @endphp
                    <th class="{{ $isWeekend ? 'bg-light text-danger' : '' }}">
                      {{ $date->format('d/m') }}<br>
                      {{ $date->locale('vi')->isoFormat('dddd') }}
                    </th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @forelse ($lichData as $hoten => $lichs)
                  <tr>
                    <td class="font-weight-bold">{{ $hoten }}</td>
                    @foreach ($dates as $date)
                      <td>
                        {{ $lichs[$date->toDateString()] ?? '' }}
                      </td>
                    @endforeach
                  </tr>
                @empty
                  <tr>
                    <td colspan="{{ $dates->count() + 1 }}">Không có dữ liệu</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
