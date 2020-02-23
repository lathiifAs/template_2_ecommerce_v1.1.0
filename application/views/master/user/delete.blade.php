<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $title }}
            </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="" class="text-muted">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('master/user') }}"
                                class="text-muted">{{ $title }}</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Hapus Data</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="container-fluid">
    <form action="{{ site_url('master/user/delete_process') }}" method="post">
        <input type="hidden" name="user_id" value="{{ $result['user_id'] }}">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <h4 class="card-title">Hapus Data</h4>
                            </div>
                            <div class="col-lg-2">
                                <div class="text-right">
                                    <a href="{{ site_url('master/user') }}" type="submit"
                                        class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger" style="margin-top: 20px">
                            <label>Data yang telah terhapus tidak akan dapat dikembalikan lagi,<strong> Yakin hapus data
                                    ini?</strong></label>
                        </div>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label><b>Nama </b></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ $result['nama'] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Jenis Kelamin </b></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                @if ($result['jns_kelamin'] == 'L')
                                                <label class="control-label">Laki-laki</label>
                                                @else
                                                <label class="control-label">Perempuan</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Hak Akses </b></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ $result['role_nm'] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Alamat</b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ $result['alamat'] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label><b>Email</b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ $result['user_mail'] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Username</b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ $result['user_name'] }}</label>

                                            </div>
                                        </div>
                                    </div>
                                    <label><b>Status</b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
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
                            </div>
                            <div class="col-lg-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-danger m-b-10 m-l-5"> Hapus</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label><b> Created by </b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ $result['mdb_name'] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label><b> Date update </b> </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ $result['mdd'] }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>