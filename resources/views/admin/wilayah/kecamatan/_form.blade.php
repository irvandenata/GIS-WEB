@extends('crud.modal')
@section('input-form')

      <div class="row">
          <div class="col-12">
            <div class="form-group">
                <label for="exampleInputUsername1">Nama Kecamatan</label>
                <input type="text" class="form-control" name="nama"  placeholder="Nama Tempat" required>
              </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="exampleInputUsername1">Jenis (cnth : Sektor 1)</label>
                <input type="text" class="form-control" name="jenis"  placeholder="Nama Tempat" required>
              </div>
          </div>
         
      
     
        <div class="col-6">
         

            
<div class="form-group">
    <label for="type">Kabupaten</label>
   <select class="form-control show-tick" name="kabupaten_id" id="typeID" required>
            <option disabled selected value>---- Pilih Salah Satu ----</option>
            @foreach ($data as $item)
                <option value="{!! $item->id !!}">{!! $item->nama !!}</option>
            @endforeach
        </select>
</div>
        </div>
      </div>
       
   
    
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="exampleInputConfirmtext1">Deskripsi</label>
                
                <textarea class="form-control" rows="5" id="textarea" placeholder="Deskripsi..." name="deskripsi" value=""></textarea>
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputConfirmtext1">Latitiude</label>
                <input id="latitude" type="text" class="form-control" name="latitude"  placeholder="Latitude" value="">
              </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputConfirmnumber1">Longitude</label>
                <input id="longitude" type="text" class="form-control" name="longitude" placeholder="Longitude" value="">
              </div>
      </div>
      </div>
      <div class="row">
          <div class="col">
            <div id="mapid"></div>
          </div>
          
      </div>
      
        
        
     
      
     
{{-- <div class="form-group">
    <div class="form-line">
        <label for="number">Gambar Produk</label>
        <input type="text" name="name" class="form-control">
    </div>
</div> --}}

{{-- <div class="form-group">
    <label for="type">Pilih Salah Satu</label>
   <select class="form-control show-tick" name="type_id" id="typeID" required>
            <option disabled selected value>---- Pilih Salah Satu ----</option>
            @foreach ($type as $item)
                <option value="{!! $item->id !!}">{!! $item->name !!}</option>
            @endforeach
        </select>
</div> --}}

@endsection
