@extends('Templates.Dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
</div>

@include('Dashboard.Alerts.Success')
@include('Dashboard.Alerts.Info')
@include('Dashboard.Alerts.Question')
@include('Dashboard.Alerts.Warning')
@include('Dashboard.Alerts.Danger')

<section class="content">
    <div class="container-fluid">
        
    </div>
</section>
@endsection
@section('script')
    {{-- <script src="{{ asset('js/dist/js/pages/dashboard.js') }}"></script> --}}
@endsection
