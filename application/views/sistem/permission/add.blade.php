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
                                            <a href="{{ site_url('sistem/navigation') }}" type="button"
                                                class="btn btn-default m-b-10 m-l-5">Kembali</a>
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
                                                    action="{{ site_url('sistem/navigation/add_process') }}" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Induk Menu</label>
                                                                <div class="col-sm-10">
                                                                    <select name="parent_id" id="single"
                                                                        class="form-control select2-single">
                                                                        <option value='0'>Tidak ada</options>
                                                                        @foreach ($rs_menu as $menu)
                                                                        <option value="{{ $menu['nav_id'] }}">
                                                                            @if ($menu['parent_id'] == 0)
                                                                            {{ $menu['nav_title'] }}
                                                                            @else
                                                                            -- {{ $menu['nav_title'] }}
                                                                            @endif
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Judul Menu</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_title"
                                                                        class="form-control" placeholder="Judul...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Deskripsi</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_desc"
                                                                        class="form-control" placeholder="Deskripsi...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Alamat
                                                                    Menu</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_url"
                                                                        class="form-control" placeholder="Alamat...">
                                                                </div>
                                                            </div>
                                                        </div><!-- /# column -->
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Urutan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_no"
                                                                        class="form-control" placeholder="Urutan...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Digunakan</label>
                                                                <div class="col-sm-10">
                                                                    <select name="active_st" class="form-control">
                                                                        <option value="1">Ya</options>
                                                                        <option value="0">Tidak</options>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label">Ditampilkan</label>
                                                                <div class="col-sm-10">
                                                                    <select name="display_st" class="form-control">
                                                                        <option value="1">Ya</options>
                                                                        <option value="0">Tidak</options>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Icon Menu</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="nav_icon"
                                                                        class="form-control" placeholder="Icon...">
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

            @push('ext_js')
            <script>
                $(document).ready(function () {
                    $(".select2-single").select2({
                        placeholder: placeholder,
                        width: '100%',
                        containerCssClass: ':all:'
                    });
                });
            </script>
            @endpush