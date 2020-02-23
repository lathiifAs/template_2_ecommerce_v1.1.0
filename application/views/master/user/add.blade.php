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
                        <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Data</li>
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
    {{-- notif wajib ada di setiap halaman admin kecuali delete--}}
    @include('template/notif')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <h4 class="card-title">Tambah Data</h4>
                        </div>
                        <div class="col-lg-2">
                            <div class="text-right">
                                <a href="{{ site_url('master/user') }}" type="submit"
                                    class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ site_url('master/user/add_process') }}" method="POST">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Nama </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nama" class="form-control"
                                                    placeholder="Isian nama...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Jenis Kelamin </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="jns_kelamin" class="form-control">
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Hak Akses </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="role_id" class="form-control">
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role['role_id'] }}">
                                                        {{ $role['role_nm'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Alamat </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="col-sm-12" rows="3" name="alamat"
                                                    placeholder="Alamat lengkap..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Email </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="user_mail" class="form-control"
                                                    placeholder="Isian email...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Username </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="user_name" class="form-control"
                                                    placeholder="Isian username...">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Password </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="password" name="user_pass" placeholder="Isian password..."
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <label>Status </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="user_st" class="form-control">
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Tidak Aktif</option>
                                                    <option value="2">Block</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success m-b-10 m-l-5"> Simpan</button>
                                        <button type="reset" class="btn btn-secondary m-b-10 m-l-5"> Reset</button>
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