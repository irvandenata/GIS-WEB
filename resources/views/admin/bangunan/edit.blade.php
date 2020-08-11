@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/leaflet/leaflet.css')}}"/>
@endpush


@push('css')
<style>
    #mapid { min-height: 400px; }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Masukkan Data Tempat</h4>
          
        <form class="forms-sample"method="post" action="{{route('bangunan.update',$data->id)}}">
            @csrf
            @method('PUT')
              <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Tempat</label>
                        <input type="text" class="form-control" name="nama"  placeholder="Nama Tempat" value="{{$data->nama}}" required>
                      </div>
                  </div>
                 
              </div>
              <div class="row">
               
                <div class="col-6">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Potensi</label>
                      <select class="form-control form-control" name="potensi_id" required>
                      <option value="{{$data->potensi->id}}">{{$data->potensi->nama}}</option>
                        @foreach ($potensi as $item)
                        
                           <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                      </select>
                    </div>
              </div>
            </div>
          
               
              
              
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
    

@endsection


@push('scripts')

@endpush

@push('js')
    


<script>









  




 

</script>
@endpush
