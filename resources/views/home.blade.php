@extends('layouts.admin')

@section('title')
<title>title</title>
@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('partials.content-header', ['name' => 'Home', 'key' => 'Home'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Trang chủ
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection