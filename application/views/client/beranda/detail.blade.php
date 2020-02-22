<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <p>Beranda/detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-right:4%">
        <a href="{{ site_url('client/beranda') }}" type="button" class="btn btn-primary m-b-10 m-l-5">Kembali</a>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
    <div class="container">
    @if($status_anggota == 'aktif')
            <div class="col-md-10 form-group p_star">
                 <div class="alert alert-success" role="alert">
                     <div class="row">
                         <div class="col-md-1"><i class="far fa-check-circle fa-5x"></i></div>
                         <div class="col-md-11 align-middle">
                             <h3 style="padding-top:1.5%"> <b style="color:green">Selamat !!</b> Anda telah menjadi anggota bisnis eco, <b>
                                     pemotongan harga 50%</b> untuk setiap produk eco</h3>
                         </div>
                     </div>
                 </div>
             </div>
            @endif
        <div class="row s_product_inner">
            <div class="col-lg-5">
                <div class="product_slider_img">
                    <div id="vertical">
                        @foreach($gambar as $g)
                        <div data-thumb="{{ base_url('assets/images/gambar_produk/'.$g['gambar_nama']) }}">
                            <img src="{{ base_url('assets/images/gambar_produk/'.$g['gambar_nama']) }}" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <form class="form-horizontal" action="{{ site_url('client/beranda/add_cart_process') }}" method="post">
                <input type="hidden" value="{{ $result['produk_id'] }}" name="produk_id">
                @if($status_anggota == 'aktif' AND $result['produk_eco_st'] == 'yes')
                    @php $nilai_diskon = $result['harga'] * 50 / 100 @endphp
                    <input type="hidden" value="{{ $nilai_diskon }}" name="harga">
                @else
                    <input type="hidden" value="{{ $result['harga'] }}" name="harga">
                @endif
                    <div class="s_product_text">
                        <h3>{{ $result['nama'] }}</h3>
                        @if($status_anggota == 'aktif' AND $result['produk_eco_st'] == 'yes')
                            @php $nilai_diskon = $result['harga'] * 50 / 100 @endphp
                            <h2 style="color:grey"><strike><i>Rp. {!! number_format($result['harga']) !!}</i></strike></h5>  <h2><i>Rp. {!! number_format($nilai_diskon) !!}</i></h2>
                        @else
                            <h2>Rp. {{ number_format($result['harga']) }}</h2>
                        @endif
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Kategori</span> : {{ $result['kategori_nama'] }}</a>
                            </li>
                            <li>
                                <a href="#"> <span>Stok</span> : @if($result['stok_st'] == 'yes') Tersedia @else <label
                                        style="color:red">Habis</label> @endif</a>
                            </li>
                        </ul>
                        <p>
                            {{ $result['deskripsi'] }}
                        </p>
                        <div class="card_area">
                            @if($result['stok_st'] == 'yes')
                            <div class="product_count d-inline-block" style="margin-right:10px">
                                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                <input class="input-number" type="text" value="1" min="0" max="100" name="jumlah">
                                <span class="number-increment"> <i class="ti-plus"></i></span>
                            </div>
                            {{ $result['satuan'] }}
                            <div class="add_to_cart">
                                <button type="submit" class="btn_3"> <i class="ti-shopping-cart"></i> Tambahkan</button>
                                @if($favorite_st == 'yes')
                                    <a href="{{ site_url('client/beranda/remove_favorit_process/'.$result['produk_id']) }}" class="like_us" style="color:blue" title="Hapus dari favorit"> <i class="fas fa-heart"></i> </a>
                                @else
                                    <a href="{{ site_url('client/beranda/add_favorit_process/'.$result['produk_id']) }}" class="like_us" title="Tambahkan ke favorit"> <i class="ti-heart"></i> </a>
                                @endif
                            </div>
                            @else
                            <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->