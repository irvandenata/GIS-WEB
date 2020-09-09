@extends('crud.modal')
@section('input-form')

<div class="row">
    <div class="col-12 ">
        <div class="form-group">
            <label for="exampleInputUsername1">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Jenis" required>
        </div>
    </div>




    <div class="col-12">



        <div class="form-group">
            <label for="type">Potensi</label>
            <select class="form-control show-tick" name="potensi_id" id="typeID" required>
                <option disabled selected value>---- Pilih Salah Satu ----</option>
                @foreach ($potensi as $item)
                <option value="{!! $item->id !!}">{!! $item->nama !!}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="type">Lambang</label>

            <input type="file" name="icon" class="form-control">

        </div>



    </div>
</div>





@endsection
