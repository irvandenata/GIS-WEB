@extends('layouts.app')

@push('styles')

@endpush


@push('css')
    
@endpush
@section('content')
<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-2 mr-4 ml-2">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-check-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Ekonomi</span>
            <span class="info-box-number">
              {{$dataPotensi->find(1)->assets->count()}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-2 mr-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-leaf"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Lingkungan</span>
            {{$dataPotensi->find(2)->assets->count()}}
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-2 mr-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-bolt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Listrik</span>
            {{$dataPotensi->find(3)->assets->count()}}
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-2 mr-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-gem"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tambang</span>
            {{$dataPotensi->find(4)->assets->count()}}
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-2 ">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-people-arrows"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Sosial</span>
            {{$dataPotensi->find(5)->assets->count()}}
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- DONUT CHART -->
      <div class="card card-danger ml-3">
        <div class="card-header">
          <h3 class="card-title">Chart Ekonomi</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
           
          </div>
        </div>
        <div class="card-body">
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
</div>
@endsection


@push('scripts')

@endpush

@push('js')
    
<script>

</script>
@endpush
