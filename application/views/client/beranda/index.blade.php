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
<div class="row" style="padding-left:5%;padding-right:5%">
    <!-- tampilan mobile -->
    <div class="col-sm-7 d-lg-none d-block">
        <!-- banner part start-->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <!-- @php
            $i = 1;
            $o = 1;
            @endphp
            <div class="carousel-inner">
                @foreach ($main_banner as $gbr_banner)
                <div class="carousel-item @if($i==1) {{ 'active' }} @endif " id="{{ $i++ }}">
                    <img class="w-100" style="height: 200px"
                        src="{{ base_url('assets/images/banner/'.$gbr_banner['nama_gambar']) }}" alt="First slide">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>
        <!-- banner part end-->
    </div>
    <div class="col-sm-12 d-lg-none d-block" style="margin-left:4%;margin-right:4%;margin-top:4%">
        <div class="row">
            <div class="alert alert-primary" role="alert" style="margin-bottom:5%">
                <font size='2'> <strong>Potongan 50%</strong>
                    <div style="margin-top:3%; margin-bottom:3%">
                        Daftar menjadi anggota bisnis ecoracing anda dapat membeli seluruh produk dengan potongan 50%
                        tanpa
                        batas waktu, untuk daftar klik tombol berikut <br>
                    </div>
                </font>
                <div class="margin-top: 3%">
                    <a href="{{ site_url('sistem/register_anggota') }}"><button class="btn btn_1"> Daftar anggota bisnis
                        </button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- tampilan website -->
    <div class="col-sm-7 d-none d-lg-block">
        <!-- banner part start-->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <!-- @php
            $i = 1;
            $o = 1;
            @endphp
            <div class="carousel-inner">
                @foreach ($main_banner as $gbr_banner)
                <div class="carousel-item @if($i==1) {{ 'active' }} @endif " id="{{ $i++ }}">
                    <img class="w-100" style="height: 400px"
                        src="{{ base_url('assets/images/banner/'.$gbr_banner['nama_gambar']) }}" alt="First slide">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>
        <!-- banner part end-->
    </div>
    <div class="col-sm-5 d-none d-lg-block">
        <div class="alert alert-primary" role="alert" style="margin-bottom:5%">
            <strong>Potongan 50% setiap produk</strong>
            <div style="margin-top:3%; margin-bottom:3%">
                Daftar menjadi anggota bisnis ecoracing anda dapat membeli seluruh produk dengan potongan 50% tanpa
                batas waktu, untuk daftar klik tombol berikut <br>
            </div>
            <div class="margin-top: 3%">
                <a href="{{ site_url('sistem/register_anggota') }}"><button class="btn btn_1"> Daftar anggota bisnis
                    </button></a>
            </div>
        </div>
        <!-- sembunyikan jika tampilan mobile -->
        <div class="alert alert-primary" role="alert" style="margin-bottom:5%">
            <strong>Daftar dan belanja sepuasnya</strong>
            <div style="margin-top:3%; margin-bottom:3%">
                Tersedia banyak produk di toko ini, jelajahi dan temukan produk yang anda inginkan. <br>
            </div>
            <div class="margin-top: 3%">
                <a href="{{ site_url('sistem/register') }}"><button class="btn btn_1_green"> Daftar akun </button></a>
            </div>
        </div>
    </div>
</div>
<!-- new arrival part here -->
<section class="new_arrival">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="arrival_filter_item filters" style="margin-left:5%; margin-rigth:5%;margin-top:1%">
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
                        <!-- @foreach($kategoris as $key => $rs)
                        <li class="controls">
                            <div class="card" style="margin:3%">
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
                        @endforeach -->
                    </ul>
                </div>
                {{-- rekomendasi start --}}
                <div style="padding-left:5%;padding-right:5%">
                    <div class="l_w_title">
                        <h3 class="bg-primary text-white">Rekomendasi</h3>
                    </div>
                    <div class="card mb-3 col-sm-12 border-primary">
                        <div class="card-body">
                            <!-- tampilan website -->
                            <!-- <div class="new_arrival_iner">
                                @foreach($rekomendasi as $i => $rs_rekomendasi)
                                <div class="single_arrivel_item col-sm-2 mix women men d-none d-lg-block">
                                    <a href="{{ site_url('client/beranda/detail/'.$rs_rekomendasi['produk_id']) }}">
                                        <img height="230" width="150"
                                            src="{{ base_url('assets/images/gambar_produk/'.$rs_rekomendasi['gambar_nama']) }}"
                                            alt="#" class="rounded" />
                                        <div class="hover_text">
                                            <p>{{ $rs_rekomendasi['kategori_nama'] }}</p>
                                            <h3>{{ $rs_rekomendasi['nama'] }}</h3>
                                            <div class="rate_icon">
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                            </div>
                                            <h3>Rp. {{ number_format($rs_rekomendasi['harga']) }}</h3>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div> -->
                            <!-- tampilan mobile -->
                            <!-- <div class="new_arrival_iner col-sm-12">
                                @foreach($rekomendasi as $i => $rs_rekomendasi)
                                <div class="single_arrivel_item col-6 mix women men d-block d-lg-none">
                                    <a href="{{ site_url('client/beranda/detail/'.$rs_rekomendasi['produk_id']) }}">
                                        <img height="90"
                                            src="{{ base_url('assets/images/gambar_produk/'.$rs_rekomendasi['gambar_nama']) }}"
                                            alt="#" class="rounded" />
                                        <div class="hover_text">
                                            <h6><b style="color:white">{{ $rs_rekomendasi['nama'] }}</b></h6>
                                            <div class="rate_icon">
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                                <a href="#"> <i class="fas fa-star"></i> </a>
                                            </div>
                                            <h6 style="color:white">Rp. {{ number_format($rs_rekomendasi['harga']) }}
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div> -->

                        </div>
                    </div>
                </div>
                <!-- rekomendasi end -->
                <!-- tampilan website -->
                <!-- <div class="new_arrival_iner filter-container" style="padding-left:4%; padding-right:4%; margin-top:2%">
                    @foreach($produk as $key => $rs)
                    <div class="single_arrivel_item col-sm-2 mix women men d-none d-lg-block">
                        <a href="{{ site_url('client/beranda/detail/'.$rs['produk_id']) }}">
                            <img height="230" width="150"
                                src="{{ base_url('assets/images/gambar_produk/'.$gambar[$key]['gambar_nama']) }}"
                                alt="#" class="rounded" />
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
                </div> -->

                <!-- tampilan mobile -->
                <div class="new_arrival_iner d-block d-lg-none col-sm-12" style="margin-top:2%">
                    <div class="container">
                        <div class="row">
                            @foreach($produk as $key => $rs)
                            <div class="col-4" style="padding-top:1%">
                                <div class="card">
                                    <a href="{{ site_url('client/beranda/detail/'.$rs['produk_id']) }}">
                                        <img height="90" width="100"
                                            src="{{ base_url('assets/images/gambar_produk/'.$gambar[$key]['gambar_nama']) }}"
                                            alt="#" class="rounded" />
                                        <div style="margin-top:2%;margin-left:2%">
                                            <h6>{{ $rs['nama'] }}</h><br>
                                                <i>Rp. {{ number_format($rs['harga']) }}</i></h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
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
                redirect("client/beranda/cari");

            }
        });
    }
</script>
@endpush