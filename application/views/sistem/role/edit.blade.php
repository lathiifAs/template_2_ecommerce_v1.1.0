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
                        <li class="breadcrumb-item"><a href="" class="text-muted">Sistem</a></li>
                        <li class="breadcrumb-item"><a href="{{ site_url('sistem/role') }}"
                                class="text-muted">{{ $title }}</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit Data</li>
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
                            <h4 class="card-title">Edit Data</h4>
                        </div>
                        <div class="col-lg-2">
                            <div class="text-right">
                                <a href="{{ site_url('sistem/role') }}" type="submit"
                                    class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ site_url('sistem/role/edit_process') }}" method="post">
                    <input type="hidden" name="role_id" value="{{ $result['role_id'] }}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Group </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <select name="group_id" id="group_id" class="form-control select2-single">
                                                @foreach ($groups as $group)
                                                <option value="{{ $group['group_id'] }}">{{ $group['group_name'] }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label> Role </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <input type="text" value="{{ $result['role_nm'] }}" name="role_nm" class="form-control" placeholder="Nama role...">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Deskripsi </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <textarea rows="5" class="col-sm-12" name="role_desc" placeholder="Deskripsi role...">{{ $result['role_desc'] }}</textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-top:50px">
                                    <div class="col-lg-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success m-b-10 m-l-5"> Simpan</button>
                                            <button type="reset" class="btn btn-secondary m-b-10 m-l-5"> Reset</button>
                                        </div>
                                    </div>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('ext_js')
<script>
    $(document).ready(function () {
        $('#group_id option[value={{ $result['group_id'] }}]').attr('selected','selected');

        $(".select2-single").select2({
            width: '100%',
            containerCssClass: ':all:'
        });
    });

</script>
@endpush