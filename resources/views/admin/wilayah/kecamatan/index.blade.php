
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
            <div class="card-header">
              <h3 class="card-title">Data Seluruh Kecamatan</h3>
              <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                <a class="btn btn-sm btn-success" onclick="createItem()">
                  <div class="demo-google-material-icon">
                      <span class="text-white">Tambahkan Kecamatan</span>
                  </div>
              </a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body mb-2">
            <table id="dataTable" class="table table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Kabupaten</th>
                        <th>Latitude</th>
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
  @include('admin.wilayah.kecamatan._form')
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
          {data:'jenis',orderable:true},
          {data:'kabupaten',orderable:true},
          {data:'latitude',orderable:true},
          {data:'longitude',orderable:true},
          {data:'deskripsi',orderable:true},
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
    /** set data untuk edit**/
    function setData(result){
        
        $('input[name=id]').val(result.id);
        $('input[name=nama]').val(result.nama);
        $('input[name=jenis]').val(result.jenis);
        $('input[name=latitude]').val(result.latitude);
        $('input[name=longitude]').val(result.longitude);
        $('textarea[name=deskripsi]').val(result.deskripsi);
        

        $("#typeID option").filter(function(){
            return $.trim($(this).val()) ==  result.kabupaten_id
        }).prop('selected', true);
        $('#typeID').selectpicker('refresh');
        
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


    

  




</script>
@endpush
