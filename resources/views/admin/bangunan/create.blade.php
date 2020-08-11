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
<div class="row ">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Masukkan Data Bangunan</h4>
        <form class="forms-sample"method="post" action="{{route('bangunan.store')}}">
            @csrf
              <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Nama Bangunan</label>
                        <input type="text" class="form-control" name="nama"  placeholder="Nama Tempat" required>
                      </div>
                  </div>
              </div>
             <div class="row">
                <div class="col-12">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Jenis Potensi</label>
                      <select class="form-control form-control" name="potensi_id" required>
                        <option value="">---Pilih---</option>
                        @foreach ($data as $item)
                        
                      <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                </div>

               
               
              </div>
            
           
            <div class="row">
               
              
              
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
