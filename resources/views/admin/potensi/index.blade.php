
@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/leaflet/leaflet.css')}}"/>

@endpush


@push('css')

<style>

    #mapid { 
      
      
      min-height: 300px; }
</style>
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->


  <!-- Main content -->
    
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-12">
          <div class="card">
            
            <div class="card-header ">
                        <p class="">Data Seluruh Potensi</p><h3>Ekonomi</h3>
                        <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                          <a class="btn btn-sm btn-success mr-3 mt-3" onclick="createItem()">
                            <div class="demo-google-material-icon">
                                <span class="text-white">Tambahkan Desa</span>
                            </div>
                        </a>
                      
                </div>
              


            </div>
            <div class="row">
                <div class="col-2 m-2">
                <button id="eko" type="button" class="btn btn-block btn-info">Ekonomi</button>
                </div>
                <div class="col-2 m-2">
                    <button id="lin" type="button" class="btn btn-block btn-info">Lingkungan</button>
                    </div>
                    <div class="col-2 m-2">
                        <button id="lis" type="button" class="btn btn-block btn-info">Listrik</button>
                        </div>
                        <div class="col-2 m-2">
                            <button id="tam" type="button" class="btn btn-block btn-info">Tambang</button>
                            </div>
                            <div class="col-2 m-2">
                                <button id="sos" type="button" class="btn btn-block btn-info">Sosial</button>
                                </div>
                                
                
    </div>
           
            <!-- /.card-header -->
            <div class="card-body mb-2">
            <table id="dataTable" class="table table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Bangunan</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Deskripsi</th>
                        <th>Longitude</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                 
                </tbody>
           
          </table>
         
        </div>
        
        
      </div>
      
    </div>
  </div>
    </div>
    <!-- /.container-fluid -->
 
  <!-- /.content -->
  @include('admin.potensi._form')
@endsection


@push('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>

<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/leaflet/leaflet.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

@endpush

@push('js')
    
@include('crud.js')

<script>


var  api = "/data/1";



 var datatable = $('#dataTable').DataTable({
      dom: 'lBfrtip',
      
      responsive:true,
      processing:true,
      serverSide:true,
      searching:true,
      pageLength:5,
      lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
      ajax:{
          url:child_url+api,
          type:'GET',
      },
      columns:[
          {data:'DT_RowIndex',orderable:false},
          {data:'nama',orderable:true},
          {data:'bangunan',orderable:true},
          {data:'kabupaten',orderable:true},
          {data:'kecamatan',orderable:true},
          {data:'desa',orderable:true},
          {data:'deskripsi',orderable:true},
          {data:'latitude',orderable:true},
          {data:'longitude',orderable:true},
          
          {data:'action',name:'#',orderable:false},
      ]
  });

  
    function createItem() {
        setForm('create','POST','Tambah Kecamatan',true)
    }

    function editItem(id) {
        setForm('update','PUT','Edit Kecamatan',true)
        editData(id)
    }
    
    function deleteItem(id) {
        deleteConfirm(id)
    }
    
</script>

<script>
function setSelect(id){

var url = '{{ route("datasel", ":id") }}';
          url = url.replace(':id',id);
        $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success:function(data) { 
                                  console.log(data) 
                    $('select[name="bangunan_id"]').empty();
                    $('select[name="bangunan_id"]').append('<option disabled selected value>---- Pilih Salah Satu ----</option>');
                    $.each(data, function(key, value) {
                        $('select[name="bangunan_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
}
    /** set data untuk edit**/
    function setData(result){
        //console.log(result)
        $('input[name=id]').val(result.id);
        $('input[name=nama]').val(result.nama);
        $('input[name=potensi_id]').val(result.potensi_id);
        $('input[name=latitude]').val(result.latitude);
        $('input[name=longitude]').val(result.longitude);
        $('textarea[name=deskripsi]').val(result.deskripsi);
        


        $("#bangID option").filter(function(){
            return $.trim($(this).val()) ==  result.bangunan_id
        }).prop('selected', true);
        


        $("#typeID option").filter(function(){
            return result.kabupaten_id != 1 ? $.trim($(this).val()) ==  result.kabupaten_id : false;
        }).prop('selected', true);
        

        $("#kecID option").filter(function(){
            return $.trim($(this).val()) ==  result.kecamatan_id
        }).prop('selected', true);
        
        
        $("#desaID option").filter(function(){
            return $.trim($(this).val()) ==  result.desa_id
        }).prop('selected', true);
        
        
        
    }
    
    // {{-- $('#ig_checkbox').click(function(){
    //     var checked = $(this).attr('checked');
        
    //     if(checked == 'checked'){
    //         $('input[name=password]').attr('disabled',true);
    //         $(this).attr('checked',false);
    //     }else{
    //         $('input[name=password]').attr('disabled',false);
    //         $(this).attr('checked','checked');

    //     } --}}

    /** reload dataTable Setelah mengubah data**/
    function reloadDatatable(){
       $('#dataTable').DataTable().ajax.reload();
    }

    $('select[name="kabupaten_id"]').on('change', function() {
        
        var kabID = $(this).val();
        if(kabID) {
          var url = '{{ route("datakec", ":id") }}';
          url = url.replace(':id',kabID);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success:function(data) { 
                                   
                    $('select[name="kecamatan_id"]').empty();
                    $('select[name="kecamatan_id"]').append('<option value="1">---- Pilih Salah Satu ----</option>');
                    $.each(data, function(key, value) {
                        $('select[name="kecamatan_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
           
        }else{
          
            $('select[name="kecamatan_id"]').empty();
            $('select[name="desa_id"]').empty();
            $('select[name="kecamatan_id"]').append('<option value="1">---- Pilih Salah Satu ----</option>');
            $('select[name="desa_id"]').append('<option value="1">---- Pilih Salah Satu ----</option>');
        }
    });


    $('select[name="kecamatan_id"]').on('change', function() {
        var kabID = $(this).val();
        if(kabID) {
          var url = '{{ route("datades", ":id") }}';
          url = url.replace(':id',kabID);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success:function(data) {
                                         
                    $('select[name="desa_id"]').empty();
                    $('select[name="desa_id"]').append('<option value="1">---- Pilih Salah Satu ----</option>');
                    $.each(data, function(key, value) {
                        $('select[name="desa_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
                
            });
           
        }else{
            $('select[name="desa_id"]').empty();
            $('select[name="desa_id"]').append('<option value="1">---- Pilih Salah Satu ----</option>');
            
        }
    });

    $('#lis').on('click',function(){
        $('.card-header h3').text("Listrik");
        $('input[name=potensi_id]').val(3);
        datatable.ajax.url( child_url+"/data/"+3 ).load();
        setSelect(3)
       
    });
    $('#eko').on('click',function(){
        $('.card-header h3').text("Ekonomi");
        $('input[name=potensi_id]').val(1);
        datatable.ajax.url( child_url+"/data/"+1 ).load();
        setSelect(1)
    });
    $('#lin').on('click',function(){
        $('.card-header h3').text("Lingkungan");
        $('input[name=potensi_id]').val(2);
        datatable.ajax.url( child_url+"/data/"+2 ).load();
        setSelect(2)
    });
    $('#tam').on('click',function(){
        $('.card-header h3').text("Tambang");
        $('input[name=potensi_id]').val(4);
        datatable.ajax.url( child_url+"/data/"+4 ).load();
        setSelect(4)
    });
    $('#sos').on('click',function(){
        $('.card-header h3').text("Sosial");
        $('input[name=potensi_id]').val(5);
        datatable.ajax.url( child_url+"/data/"+5 ).load();
        setSelect(5)
    });
    
    

    




</script>

@endpush
