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
                                <li><a href="#">Atur Halaman Depan</a></li>
                                <li class="active">Kontak</li>
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
                                    <h4>Edit Kontak</h4>
                                    <div class="card-header-right-icon">
                                        <ul>
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
                                                <form class="form-horizontal"
                                                    action="{{ site_url('setclient/contact/edit_process') }}" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Telephone</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="telephone" class="form-control" value="{{ $result['telephone'] }}"
                                                                        placeholder="Nomor Telephone...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Whatsapp</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="no_whatsapp" class="form-control" value="{{ $result['no_whatsapp'] }}"
                                                                        placeholder="Nomor Whatsapp...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Fanpage Facebook</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="fanpage_fb" class="form-control" value="{{ $result['fanpage_fb'] }}"
                                                                        placeholder="Akun Fanpage...">
                                                                </div>
                                                            </div>
                                                        </div><!-- /# column -->
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="email" value="{{ $result['email'] }}"
                                                                        class="form-control"
                                                                        placeholder="Isian email...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Alamat</label>
                                                                <div class="col-sm-10">
                                                                    <textarea rows="5" cols="50" class="col-sm-12" name="alamat"
                                                                        placeholder="Alamat lengkap...">{{ $result['alamat'] }}</textarea>
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