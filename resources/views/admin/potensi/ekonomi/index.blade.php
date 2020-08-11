@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
@endpush


@push('css')
    
@endpush
@section('content')

<div class="row">
    <div class="col-md-12 stretch-card">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-10"><h4 class="text mt-2" >SEMUA ASET PERBATASAN</h4></div>
          <div class="col-2"> <a  href="{{route('potensi.ekonomi.create')}}" class="btn btn-success text-white ">Tambah Data</a></div>
           </div>
          
        </div>
        <div class="card-body">
          
          <div class="table-responsive">
            <table  class="table" id="dataTable">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                   
                    
                    <th>Bangunan</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                {{-- <tr>
                    <td>1</td>
                    <td>PLTD</td>
                    <td>Listrik</td>
                    <td>Kabupaten</td>
                    <td>Kecamatan</td>
                    <td>Desa</td>
                    <td>000000000</td>
                    <td>000056555</td>
                    <td>edit hapus</td>
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('modal')
@endsection


@push('scripts')
{{-- <script src="{{ asset('assets/js/dashboard.js')}}"></script> --}}
<script src="{{ asset('assets/js/data-table.js')}}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.js')}}"></script>

@endpush

@push('js')
    

<script>

const child_url = "{!! request()->url() !!}";
  $('#dataTable').DataTable({
      dom: 'lBfrtip',
      
      responsive:true,
      processing:true,
      serverSide:true,
      searching:true,
      pageLength:5,
      lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
      ajax:{
          url:child_url,
          type:'GET',
      },
      columns:[
          {data:'DT_RowIndex',orderable:false},
          {data:'nama',orderable:true},
          
          {data:'bangunan',orderable:true},
          {data:'kabupaten',orderable:true},
          {data:'kecamatan',orderable:true},
          {data:'desa',orderable:true},
          {data:'latitude',orderable:true},
          {data:'longitude',orderable:true},
          {data:'action',name:'#',orderable:false},
      ]
  });

  function reloadDatatable(){
       $('#dataTable').DataTable().ajax.reload();
    }



    function deleteItem(id) {
     
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url  = child_url + '/' + id;;
    // confirm then
    $.ajax({
        url: url,
        type: 'DELETE',
        dataType: 'json',
        data: {method: '_DELETE', submit: true}
    }).always(function (data) {
        $('#dataTable').DataTable().ajax.reload();
        $("#alert").addClass("show");
    },
    );

   

};


function detailItem(id) {
        
        $('#modalForm').modal('show');
        $.ajax({
            url: child_url + "/" + id,
            type: "GET",
            dataType: "json",
            success: function (result) {
              $("#deskripsi").empty();
              var nameList = result.deskripsi.split(/\r?\n/);
              for(let i = 0; i < nameList.length; i++){
                var x = document.createElement("P");
                var t = document.createTextNode(nameList[i]);
                x.appendChild(t);
               
                  $('#deskripsi').append(x);


                  }
              
                
            },
            error: function (result) {
                console.log("gagal");
            }
        })
    }

    

</script>
@endpush
