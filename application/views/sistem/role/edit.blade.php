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
                                    <li class="active">Edit</li>
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
                            <h4>Edit</h4>
                            <div class="card-header-right-icon">
                                <ul>
                                    <a href="{{ site_url('sistem/role') }}" type="button" class="btn btn-default m-b-10 m-l-5">Kembali</a>
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
                                            <form class="form-horizontal" action="{{ site_url('sistem/role/edit_process') }}" method="post">
                                                <input type="hidden" name="role_id" value="{{ $result['role_id'] }}">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Group</label>
                                                            <div class="col-sm-10">
                                                                <select name="group_id" id="group_id" class="form-control">
                                                                @foreach ($groups as $group)
                                                                <option value="{{ $group['group_id'] }}">{{ $group['group_name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Role</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" value="{{ $result['role_nm'] }}" name="role_nm" class="form-control" placeholder="Nama role...">
                                                            </div>
                                                        </div>
                                                    </div><!-- /# column -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Deskripsi</label>
                                                            <div class="col-sm-10">
                                                                <textarea rows="5" class="col-sm-12" name="role_desc" placeholder="Deskripsi role...">{{ $result['role_desc'] }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                                <div class="col-lg-12">
                                                                        <label class="control-label"><b> Created by </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                        <label class="control-label">{{ $result['mdb_name'] }}</label>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                                <div class="col-lg-12">
                                                                        <label class="control-label"><b> Date update </b></label>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                        <label class="control-label">{{ $result['mdd'] }}</label>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                    <div class="card-footer text-right">
                                                        <button type="submit" class="btn btn-primary btn-rounded m-b-10 m-l-5">Simpan</button>
                                                        <button type="reset" class="btn btn-dark btn-rounded m-b-10 m-l-5">Reset</button>
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

    
    <script src="{{ base_url('assets/js/lib/jquery.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#group_id option[value={{ $result['group_id'] }}]').attr('selected','selected');
        });
    </script>


