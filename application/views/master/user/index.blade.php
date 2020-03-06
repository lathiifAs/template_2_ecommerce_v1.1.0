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
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Master</a></li>
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
                            <h4 class="card-title col-lg-12">Daftar User</h4>
                        </div>
                        <form class="col-lg-12 row" action="{{ site_url('master/user/search_process') }}" method="POST">
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                    name="nama" placeholder="Nama" value="{{ $search['nama'] }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                    placeholder="Email" name="user_mail" value="{{ $search['user_mail'] }}">
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" name="search" value="tampilkan" class="btn btn-info">Cari</button>
                                <button type="submit" name="search" value="reset"
                                    class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <div class="text-right col-lg-12">
                            <a href="{{ site_url('master/user/add') }}" type="submit" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-align text-center" width="5%">No.</th>
                                    <th class="text-align text-center" width="15%">Nama</th>
                                    <th class="text-align text-center" width="7%">Role</th>
                                    <th class="text-align text-center" width="13%">Username</th>
                                    <th class="text-align text-center" width="10%">Email</th>
                                    <th class="text-align text-center" width="5%">Status</th>
                                    <th class="text-align text-center" width="25%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($result))
                                    @foreach ($result as $rs)
                                    <tr>
                                        <th class="text-align text-center"> {{ $no++ }} </th>
                                        <td>{{ $rs['nama'] }}</td>
                                        <td class="text-align text-center">{{ $rs['role_nm'] }}</td>
                                        <td>{{ $rs['user_name'] }}</td>
                                        <td>{{ $rs['user_mail'] }}</td>
                                        <td class="text-align text-center">
                                            @if ($rs['user_st'] == 0)
                                            <span class="badge badge-danger">tidak aktif</span>
                                            @elseif ($rs['user_st'] == 1)
                                            <span class="badge badge-success">aktif</span>
                                            @elseif ($rs['user_st'] == 2)
                                            <span class="badge badge-danger">Block</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ site_url('master/user/detail/'.$rs['user_id']) }}" type="button"
                                                class="btn btn-info btn-rounded m-b-10 m-l-5" title="Detail"><i
                                                    class="ti-eye"></i> Detail</a>
                                            <a href="{{ site_url('master/user/edit/'.$rs['user_id']) }}"
                                                class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i
                                                    class="ti-pencil"></i> Edit</a>
                                            <a href="{{ site_url('master/user/delete/'.$rs['user_id']) }}"
                                                class="btn btn-danger btn-rounded m-b-10 m-l-5" title="Delete"><i
                                                    class="ti-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th class="text-align text-center" colspan="7"><h3> Data kosong </h3></th>
                                    </tr>
                                @endif
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