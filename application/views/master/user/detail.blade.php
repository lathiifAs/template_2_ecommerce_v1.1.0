<div class="content-wrap">
        <div class="main">
            <!-- breadcrum -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
                            <div class="page-title">
                            <h1>{{ $title }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Master</a></li>
                                    <li class="active">{{ $title }}</li>
                                    <li class="active">Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                <div>
            </div>
            <!-- akhir breadcrum -->
            <div class="main-content">
            <!-- /# row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card alert">
                        <div class="card-header">
                            <h4>Detail</h4>
                            <div class="card-header-right-icon">
                                <ul>
                                    <a href="{{ site_url('master/user') }}" type="button" class="btn btn-default m-b-10 m-l-5">Kembali</a>
                                </ul>
                            </div>
                        </div>

                        {{-- notif --}}
                        @include('template/notif')
                        
                        <hr>
                        <div class="card-body" style="margin-top:20px">
                            <div class="card-content">
                            <div class="main">
                                    <div class="horizontal-form-elements">
                                            <form class="form-horizontal" action="{{ site_url('master/user/add_process') }}" method="post">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <div class="col-lg-12">
                                                                    <label class="control-label"><b> Nama </b></label>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                    <label class="control-label">{{ $result['nama'] }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <div class="col-lg-12">
                                                                        <label class="control-label"><b> Jenis Kelamin </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    @if ($result['jns_kelamin'] == 'L')
                                                                        <label class="control-label">Laki-laki</label>
                                                                    @else
                                                                        <label class="control-label">Perempuan</label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        <div class="form-group">
                                                            <div class="col-lg-12">
                                                                    <label class="control-label"><b> Alamat </b></label>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                    <label class="control-label">{{ $result['alamat'] }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <div class="col-lg-12">
                                                                        <label class="control-label"><b> Hak Akses </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                        <label class="control-label">{{ $result['role_nm'] }}</label>
                                                                </div>
                                                        </div>
                                                    </div><!-- /# column -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <div class="col-lg-12">
                                                                    <label class="control-label"><b> Email </b></label>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                    <label class="control-label">{{ $result['user_mail'] }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <div class="col-lg-12">
                                                                        <label class="control-label"><b> Username </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                        <label class="control-label">{{ $result['user_name'] }}</label>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <div class="col-lg-12">
                                                                        <label class="control-label"><b> Status </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                        @if ($result['user_st'] == 0)
                                                                            <span class="badge badge-danger">tidak aktif</span>  
                                                                        @elseif ($result['user_st'] == 1)
                                                                            <span class="badge badge-success">aktif</span> 
                                                                        @elseif ($result['user_st'] == 2)
                                                                            <span class="badge badge-danger">Block</span> 
                                                                        @endif
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                                <div class="col-lg-12">
                                                                        <label class="control-label"><b> Created by </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                        <label class="control-label">{{ $result['mdb_name'] }}</label>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                                <div class="col-lg-12">
                                                                        <label class="control-label"><b> Date update </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                        <label class="control-label">{{ $result['mdd'] }}</label>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        </div>
    </div>
    