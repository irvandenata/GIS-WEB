

<div class="modal fade" id="modalForm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                @method('POST')
                <input id="id" type="hidden" name="id" value="">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalFormTitle">Detail Potensi</h4>
                    
                </div>
                <div class="modal-body">
                 
                  
                          {{-- <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src=""
                                 alt="User profile picture">
                          </div> --}}
          
                          <h3 class="profile-username text-center">Desa Sudah Berlistrik</h3>
          
                          <p class="text-muted text-center"></p>
          
                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Kabupaten</b> <a class="kab float-right"></a>
                            </li>
                            <li class="list-group-item">
                              <b>Kecamatan</b> <a class="kec float-right"></a>
                            </li>
                            <li class="list-group-item">
                              <b>Desa</b> <a class="des float-right"></a>
                            </li>
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputConfirmtext1">Deskripsi</label>
                                            
                                            <textarea class="form-control" rows="5" id="textarea" placeholder="" name="deskripsi" value="" disabled></textarea>
                                          </div>
                                    </div>
                                </div>
                        
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

