@extends('layouts.app')

@push('styles')

@endpush


@push('css')
    
@endpush
@section('content')
 <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body dashboard-tabs p-0">
                      <ul class="nav nav-tabs px-4" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Total Aset</a>
                        </li>
                        
                      </ul>
                      <div class="tab-content py-0 px-0">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                          <div class="d-flex flex-wrap justify-content-xl-between">
                            <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                              <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                              <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Ekonomi</small>
                                
                                  <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h5 class="mb-0 d-inline-block">{{ $data?? "0"}}</h5>
                                  </a>
                                  
                               
                              </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                              <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                              <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Tambang</small>
                                <h5 class="mr-2 mb-0">{{ $data?? "0"}}</h5>
                              </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                              <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                              <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Sosial</small>
                                <h5 class="mr-2 mb-0">{{ $data?? "0"}}</h5>
                              </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                              <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                              <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Lingkungan</small>
                                <h5 class="mr-2 mb-0">{{ $data?? "0"}}</h5>
                              </div>
                            </div>
                            <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                              <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                              <div class="d-flex flex-column justify-content-around">
                                <small class="mb-1 text-muted">Listrik</small>
                                <h5 class="mr-2 mb-0">{{ $listrik?? "0"}}</h5>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
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
