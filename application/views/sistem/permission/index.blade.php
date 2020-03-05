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
                        <li class="breadcrumb-item text-muted active" aria-current="page">{{ $title }}</li>
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
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <h4 class="card-title col-lg-12">Daftar Hak Role</h4>
                        </div>

                        <form class="col-lg-12 row" action="{{ site_url('sistem/permission/search_process') }}"
                            method="POST">
                            <div class="col-lg-5">
                                <select name="nav_id" id="single" class="form-control select2-single">
                                    <option value='0'>Tidak ada</options>
                                        @foreach ($rs_group as $group)
                                    <option value="{{ $group['group_id'] }}">{{ $group['group_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" name="search" value="tampilkan" class="btn btn-info">Cari</button>
                                <button type="submit" name="search" value="reset"
                                    class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive" style="margin-top:2%">
                        <table class="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-align text-center" width="5%">No.</th>
                                    <th class="text-align text-center" width="25%">Group</th>
                                    <th class="text-align text-center" width="25%">Nama Role</th>
                                    <th class="text-align text-center" width="25%">Deskripsi Role</th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $rs)
                                <tr>
                                    <th class="text-align text-center"> {{ $no++ }} </th>
                                    <td>{{ $rs['group_name'] }}</td>
                                    <td>{{ $rs['role_nm'] }}</td>
                                    <td>{{ $rs['role_desc'] }}</td>
                                    <td>
                                        <a href="{{ site_url('sistem/permission/edit/'.$rs['role_id']) }}"
                                            class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i
                                                class="ti-pencil"></i> Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            @if (isset($pagination))
                                {!! $pagination !!}
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- script untuk js external -->
@push('ext_js')
<script>
    $(document).ready(function () {
        $(".select2-single").select2({
            width: '100%',
            containerCssClass: ':all:'
        });
    });
</script>
@endpush