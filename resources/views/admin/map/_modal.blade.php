<div class="modal fade" id="modalForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                @method('POST')
                <input id="id" type="hidden" name="id" value="">
                <div class="modal-header">
                    <h3 class="modal-title ml-4" id="modalFormTitle"><b>Detail</b></h3>
                </div>
                <div class="modal-body m-2">
                    {{-- <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src=""
                                 alt="User profile picture">
                          </div> --}}


                    <ul class="list-group list-group-unbordered mb-3 ml-4 mr-4">
                        <li class="mb-2">
                            <p class="text-muted margin-none">Jenis Potensi</p>
                            <h3><b class="pot">Kecamatan</b></h3>
                        </li>
                        <li class="mb-2">
                            <p class="text-muted margin-none na">Jenis</p>
                            <h3><b class="sub">Test</b></h3>
                        </li>
                        <li class="mb-2">
                            <p class="text-muted margin-none">Lokasi</p>
                            <h3><b class="lok">Test</b> </h3>
                        </li>
                        <li class="mb-2">
                            <p class="text-muted margin-none">Deskripsi</p>
                            <h4><b class="des">Test</b> </h4>
                        </li>

                    </ul>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                </div>
            </form>

        </div>
    </div>
</div>
