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
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Sistem</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="index.html"
                                class="text-muted">{{ $title }}</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit</li>
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
                        <div class="col-lg-9">
                            <h4 class="card-title">Edit Data</h4>
                        </div>
                        <div class="col-lg-3">
                            <div class="text-right">
                                <a href="{{ site_url('sistem/permission') }}" type="submit"
                                    class="btn btn-primary"> Kembali </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <form action="{{ site_url('sistem/permission/edit_process') }}" method="post">
                                <input type="hidden" name="role_id" value="{{ $result['role_id'] }}">
                                <table class="table">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th class="text-align text-center" width="10%"> <input type="checkbox"
                                                    id="checked-all-menu" class="checked-all-menu"> Semua</th>
                                            <th class="text-align text-center" width="50%">Judul Navigasi</th>
                                            <th class="text-align text-center" width="10%">Create</th>
                                            <th class="text-align text-center" width="10%">Read</th>
                                            <th class="text-align text-center" width="10%">Update</th>
                                            <th class="text-align text-center" width="10%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {!! $list_menu !!}
                                    </tbody>
                                </table>
                                <div class="col-lg-12">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success m-b-10 m-l-5"> Simpan</button>
                                        <button type="reset" class="btn btn-secondary m-b-10 m-l-5"> Reset</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-right">
                                @if (isset($pagination))
                                {!! $pagination !!}
                                @endif
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
            width: '100%',
            containerCssClass: ':all:'
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $(".checked-all").click(function () {
            var status = $(this).is(":checked");
            if (status === true) {
                $(".r" + $(this).val()).prop('checked', true);
            } else {
                $(".r" + $(this).val()).prop('checked', false);
            }
        });
        $(".checked-all-menu").click(function () {
            var status = $(this).is(":checked");
            if (status === true) {
                $(".r-menu").prop('checked', true);
            } else {
                $(".r-menu").prop('checked', false);
            }
        });
        $(".select-2").select2();
    });
</script>
@endpush