<!-- here your get data --->
<script>
    const child_url = "{!! request()->url() !!}";

    function setForm(saved, method, title ) {
        save_method = saved;
        $('input[name=_method]').val(method);
        $('#modalForm form')[0].reset();
        $(':input[name=id]').val('');
        $('#modalFormTitle').text(title);
        $('#modalForm').modal('show');  
        
         
    }

    function editData(id) {
        $.ajax({
            url: child_url + "/" + id + "/edit",
            type: "GET",
            dataType: "json",
            success: function (result) {
                console.log(result);
                // console.log(result);
                setData(result);
            },
            error: function (result) {
                console.log(result);
            }
        })
    }

    function setUrl() {
        var id = $('#id').val();
        if (save_method == "create") url = child_url;
        else url = child_url + '/' + id;
        
        return url;
    }

    /** ambil data error**/
    function getError(errors) {
        $.each(errors, function (index, value) {
            value.filter(function (obj) {
                return error = obj;
            });
            toastr.error(error, 'Error', {
                closeButton: true,
                progressBar: true,
            });
        });
    }

    /** save data onsubmit**/    
    $(function () {
        $('#modalForm form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                saveAjax(setUrl());
                return false;
            }
        });
    });

    function saveAjax(url) {
        $.ajax({
            url: url,
            type: "post",
            cache: false,
            dataType: 'json',
            data: new FormData($('#modalForm form')[0]),
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {  
                $('#modalForm').modal('hide');
                reloadDatatable();
               
                toastr.success('Berhasil Disimpan', 'Success');
                
            },
            error: function (result) {
                $('#modalForm').modal('hide');

                if(result.responseJSON){
                    getError(result.responseJSON.errors);
                }else{
                console.log(result);
                }
            },
        })
    }

    /** konfirmasi hapus data **/
    function deleteConfirm(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success m-1',
            cancelButtonClass: 'btn btn-danger m-1',
            buttonsStyling: false,
        })

        swalWithBootstrapButtons.fire({
            title: 'Anda Yakin ?',
            text: "Anda yakin ingin menghapus data ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak, Keluar!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                deleteData(id);
                swalWithBootstrapButtons.fire(
                    'Dihapus!',
                    'Data Telah Dihapus',
                    'success'
                )
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Dibatalkan',
                    'Data anda diamankan :)',
                    'error'
                )
            }
        })
    }

    /** hapus data dari database **/
    function deleteData(id) {
        var url = child_url + '/' + id;
        $.ajax({
            url: url,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                reloadDatatable();
                toastr.success('Berhasil Dihapus', 'Success');
            },
            error: function (errors) {
                getError(errors.responseJSON.errors);
            }
        });
    }


    

 

    var map = L.map('mapid').setView([ 0, 109], 10);
    
    $('#modalForm').on('shown.bs.modal', function() {
        map.invalidateSize();
       
    



    var title = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);




    

    var mapCenter = [0.0528716965978, 110.73120117187];

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 12);
        let longitude = e.latlng.lng.toString().substring(0, 12);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
        map.setView([latitude,longitude], 10);
    });

    var updateMarkerByInputs = function() {
        map.setView([$('#latitude').val(),$('#longitude').val()], 10);
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
    

});

// $('#modalForm').on('hidden.bs.modal', function() {
    
// });

</script>