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
                            <h4>Daftar Group</h4>
                            <div class="card-header-right-icon">
                                <ul>
                                    <a href="{{ site_url('sistem/group/add') }}" type="button" class="btn btn-primary m-b-10 m-l-5">Tambah Data</a>
                                </ul>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body" style="margin-top:20px">
                            <div class="card-content">
                                    <div class="horizontal-form-elements">
                                            <form class="form-horizontal">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Group</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="group_name" class="form-control" placeholder="Nama group...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button type="button" class="btn btn-default m-b-10 m-l-5">Cari</button>
                                                        <button type="button" class="btn btn-dark m-b-10 m-l-5">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        {{-- notif --}}
                                        @include('template/notif')

                                        <hr>
                                        <table class="table table-responsive table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-align text-center">No.</th>
                                                <th class="text-align text-center">Group</th>
                                                <th class="text-align text-center">Deskripsi</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($result as $rs)
                                                <tr>
                                                    <th class="text-align text-center"> {{ $no++ }} </th>
                                                    <td class="text-align">{{ $rs['group_name'] }}</td>
                                                    <td>{{ $rs['group_desc'] }}</td>
                                                    <td>
                                                            <a href="{{ site_url('sistem/group/detail/'.$rs['group_id']) }}" type="button" class="btn btn-info btn-rounded m-b-10 m-l-5" title="Detail"><i class="ti-eye"></i></a>
                                                            <a href="{{ site_url('sistem/group/edit/'.$rs['group_id']) }}" class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i class="ti-pencil"></i></a>
                                                            <a href="{{ site_url('sistem/group/delete/'.$rs['group_id']) }}" class="btn btn-danger btn-rounded m-b-10 m-l-5" title="Delete"><i class="ti-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="text-right">
                                        @if (isset($pagination))
                                            <ul class="pagination pagination-sm">
                                                    <li class="page-item"><a class="page-link" href="#">{!! $pagination !!}</a></li>
                                            </ul>
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        </div>
    </div>
    