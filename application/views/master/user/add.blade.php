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
                                            <a href="{{ site_url('master/user') }}" type="button"
                                                class="btn btn-default m-b-10 m-l-5">Kembali</a>
                                        </ul>
                                    </div>
                                </div>

                                {{-- notif wajib ada di setiap halaman admin kecuali delete--}}
                                @include('template/notif')

                                <hr>
                                <div class="card-body" style="margin-top:20px">
                                    <div class="card-content">
                                        <div class="main">
                                            <div class="horizontal-form-elements">
                                                <form class="form-horizontal"
                                                    action="{{ site_url('master/user/add_process') }}" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nama" class="form-control"
                                                                        placeholder="Isian nama...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Jenis
                                                                    Kelamin</label>
                                                                <div class="col-sm-10">
                                                                    <select name="jns_kelamin" class="form-control">
                                                                        <option value="L">Laki-laki</option>
                                                                        <option value="P">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Alamat</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="col-sm-12" name="alamat"
                                                                        placeholder="Alamat lengkap..."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Hak Akses</label>
                                                                <div class="col-sm-10">
                                                                    <select name="role_id" class="form-control">
                                                                        @foreach ($roles as $role)
                                                                        <option value="{{ $role['role_id'] }}">
                                                                            {{ $role['role_nm'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!-- /# column -->
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="user_mail"
                                                                        class="form-control"
                                                                        placeholder="Isian email...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Username</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="user_name"
                                                                        class="form-control"
                                                                        placeholder="Isian username...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Password</label>
                                                                <div class="col-sm-10">
                                                                    <input type="password" name="user_pass"
                                                                        placeholder="Isian password..."
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Status</label>
                                                                <div class="col-sm-10">
                                                                    <select name="user_st" class="form-control">
                                                                        <option value="1">Aktif</option>
                                                                        <option value="0">Tidak Aktif</option>
                                                                        <option value="2">Block</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="card-footer text-right">
                                                        <button type="submit"
                                                            class="btn btn-success btn-rounded m-b-10 m-l-5"><i
                                                                class="ti-check"></i> Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-dark btn-rounded m-b-10 m-l-5"><i
                                                                class="ti-back-left"></i> Reset</button>
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