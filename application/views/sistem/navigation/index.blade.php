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
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <h4 class="card-title col-lg-12">Daftar Navigasi</h4>
                        </div>
                        <form class="col-lg-12 row" action="{{ site_url('sistem/navigation/search_process') }}"
                            method="POST">
                            <div class="col-lg-6">
                                <select name="nav_id" id="single" class="form-control select2-single">
                                    <option value='0'>Pilih Navigasi</options>
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
                            <div class="col-lg-3">
                                <button type="submit" name="search" value="tampilkan" class="btn btn-info">Cari</button>
                                <button type="submit" name="search" value="reset"
                                    class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <div class="text-right col-lg-12">
                            <a href="{{ site_url('sistem/navigation/add') }}" type="submit"
                                class="btn btn-primary">Tambah
                                Data</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-align text-center" width="5%">No.</th>
                                    <th class="text-align text-center" width="20%">Judul Navigasi</th>
                                    <th class="text-align text-center" width="20%">URL Navigasi</th>
                                    <th class="text-align text-center" width="10%">Menu Client</th>
                                    <th class="text-align text-center" width="10%">Digunakan</th>
                                    <th class="text-align text-center" width="10%">Ditampilkan</th>
                                    <th class="text-align text-center" width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $rs)
                                <tr>
                                    <th class="text-align text-center"> {{ $no++ }} </th>
                                    <td>
                                        @if ($rs['parent_id'] == 0)
                                        {{ $rs['nav_title'] }}
                                        @else
                                        -- {{ $rs['nav_title'] }}
                                        @endif
                                    </td>
                                    <td>{{ $rs['nav_url'] }}</td>
                                    <td class="text-align text-center">
                                        @if ($rs['client_st'] == 1)
                                        <span class="label label-primary">Ya</span>
                                        @else
                                        <span class="label label-danger">Tidak</span>
                                        @endif
                                    </td>
                                    <td class="text-align text-center">
                                        @if ($rs['active_st'] == 1)
                                        <span class="label label-primary">Ya</span>
                                        @else
                                        <span class="label label-danger">Tidak</span>
                                        @endif
                                    </td>
                                    <td class="text-align text-center">
                                        @if ($rs['display_st'] == 1)
                                        <span class="label label-primary">Ya</span>
                                        @else
                                        <span class="label label-danger">Tidak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ site_url('sistem/navigation/edit/'.$rs['nav_id']) }}"
                                            class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i
                                                class="ti-pencil"></i> Edit </a>
                                        <a href="{{ site_url('sistem/navigation/delete/'.$rs['nav_id']) }}"
                                            class="btn btn-danger btn-rounded m-b-10 m-l-5" title="Delete"><i
                                                class="ti-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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