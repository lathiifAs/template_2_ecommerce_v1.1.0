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
                                    <li><a href="#">Sistem</a></li>
                                    <li class="active">{{ $title }}</li>
                                    <li class="active">Tambah Data</li>
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
                            <h4>Tambah Data</h4>
                            <div class="card-header-right-icon">
                                <ul>
                                    <a href="{{ site_url('sistem/group') }}" type="button" class="btn btn-default m-b-10 m-l-5">Kembali</a>
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
                                            <form class="form-horizontal" action="{{ site_url('sistem/group/add_process') }}" method="post">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Group</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="group_name" class="form-control" placeholder="Nama group...">
                                                            </div>
                                                        </div>
                                                    </div><!-- /# column -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Deskripsi</label>
                                                            <div class="col-sm-10">
                                                                <textarea rows="2" class="col-sm-12" name="group_desc" placeholder="Deskripsi role..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                    <div class="card-footer text-right">
                                                        <button type="submit"
                                                            class="btn btn-success btn-rounded m-b-10 m-l-5"><i class="ti-check"></i> Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-dark btn-rounded m-b-10 m-l-5"><i class="ti-back-left"></i> Reset</button>
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
    