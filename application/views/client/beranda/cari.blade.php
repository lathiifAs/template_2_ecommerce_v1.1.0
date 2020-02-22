<div style="margin-bottom: 10px;padding-left:5%;padding-right:5%">
    <form method="POST" enctype="multipart/form-data" action="{{ site_url('client/beranda/search')}}">
        <div class="input-group">
            <input type="text" name="produk_nama" class="form-control" placeholder="Masukkan Nama Produk"
                @if(!empty($rs_search['produk_nama'])) value="{{ $rs_search['produk_nama'] }}" @else @endif>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary" value="tampilkan" name="search">
                    <i class="fa fa-search fa-sm mr-1"></i>
                    <div class="d-none d-xs-block">Search</div>
                </button>
                <button value="reset" name="search" class="btn btn-dark">
                    <i class="fa text-white fa-sync fa-sm mr-1"></i>
                    <div class="d-none d-xs-block">Reset</div>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- new arrival part here -->
<section class="new_arrival">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="arrival_filter_item filters" style="margin-left:5%; margin-rigth:5%;">
                    <ul>
                        {{-- <li class="controls">
                            <div class="card">
                                <div class="card-body">
                                    <b>Tampilkan Semua</b>
                                </div>
                            </div>
                        </li> --}}
                        {{-- <li @if($rs_search_kategori['kategori_id']==0) class="active controls" @endif
                            onclick="cariKategori(0)"><b>Tampilkan Semua</b></li> --}}
                        @foreach($kategoris as $key => $rs)
                        <li class="controls">
                            <div class="card">
                                <a href="{{ site_url('client/beranda/search_by_kategori/'.$rs['kategori_id']) }}">
                                <div class="card-body">
                                    <img width="35" height="35"
                                        src="{{ base_url('assets/images/logo_kategori/').$rs['logo'] }}" />
                                </div>
                                </a>
                            </div>
                        </li>
                        {{-- <li @if($rs_search_kategori['kategori_id'] == $rs['kategori_id']) class="active controls" @endif onclick="cariKategori({{ $rs['kategori_id'] }})">{{ $rs['kategori_nama'] }}
                        </li> --}}
                        @endforeach
                    </ul>
                </div>
                {{-- rekomendasi start --}}
                
                {{-- rekomendasi end --}}
                <div class="new_arrival_iner filter-container" style="padding-left:4%; padding-right:4%; margin-top:2%">
                    @foreach($produk as $key => $rs)
                    <div class="single_arrivel_item col-md-2 mix women men">
                        <a href="{{ site_url('client/beranda/detail/'.$rs['produk_id']) }}">
                            <img height="250" width="150"
                                src="{{ base_url('assets/images/gambar_produk/'.$gambar[$key]['gambar_nama']) }}"
                                alt="#" />
                            <div class="hover_text">
                                <p>{{ $rs['kategori_nama'] }}</p>
                                <h3>{{ $rs['nama'] }}</h3>
                                {{-- <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div> --}}
                                <h3>Rp. {{ number_format($rs['harga']) }}</h3>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new arrival part end -->
@push('ext_js')
<script>
    function cariKategori(kategori_id) {
        $.ajax({
            type: "POST",
            url: "{{ site_url('client/beranda/search_by_kategori/') }}",
            data: {
                'kategori_id': kategori_id
            },
            success: function (data) {
                location.reload();
            }
        });
    }
</script>
@endpush