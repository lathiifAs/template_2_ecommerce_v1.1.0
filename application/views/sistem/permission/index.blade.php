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
                            <h4>Daftar Hak Akses User</h4>
                            <div class="card-header-right-icon">
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
                                                            <label class="col-sm-3 control-label">Group</label>
                                                            <div class="col-sm-9">
                                                            <select name="nav_id" id="single" class="form-control select2-single">
                                                            <option value='0'>Tidak ada</options>
                                                                @foreach ($rs_group as $group)
                                                                <option value="{{ $group['group_id'] }}">{{ $group['group_name'] }}</option>
                                                                @endforeach
                                                            </select>
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
                                                <th class="text-align text-center">Nama Role</th>
                                                <th class="text-align text-center">Deskripsi Role</th>
                                                <th class="text-align text-center"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($result as $rs)
                                                <tr>
                                                    <th class="text-align text-center"> {{ $no++ }} </th>
                                                    <td>{{ $rs['group_name'] }}
                                                    </td>
                                                    <td>{{ $rs['role_desc'] }}</td>
                                                    <td>
                                                            <a href="{{ site_url('sistem/permission/edit/'.$rs['role_id']) }}" class="btn btn-success btn-rounded m-b-10 m-l-5" title="Edit"><i class="ti-pencil"></i></a>
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
        </div>
    </div>
    <!-- script untuk js external -->
@push('ext_js')
<script>
    $(document).ready(function () {
        $( ".select2-single" ).select2( {
				placeholder: placeholder,
                width: '100%',
				containerCssClass: ':all:'
			} );
    });
</script>
@endpush