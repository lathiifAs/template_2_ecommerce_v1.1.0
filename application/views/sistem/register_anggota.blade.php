<body class="bg-white">
	<!--::header part start::-->
	<header class="main_menu home_menu">
		<div class="container-fluid">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-11">
				</div>
			</div>
		</div>
	</header>
	<!-- Header part end-->

	<!--================Home Banner Area =================-->
	<!-- breadcrumb start-->
	<section class="breadcrumb breadcrumb_bg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="breadcrumb_iner">
						<div class="breadcrumb_iner_item">
							<p>Daftar Anggota Bisnis Ecoracing</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- breadcrumb start-->

	<!--================login_part Area =================-->
	<section class="login_part section_padding">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12 col-md-12">
					
						<div class="login_part_form_iner">
							<!-- {{-- notif --}} -->
							{{-- @include('template/notif') --}}
							<h3>Daftar Anggota Bisnis Ecoracing<br></h3><br><br>
							<form action="{{ site_url('sistem/register_anggota/register_process') }}" method="post">
							<input type="hidden" name="nama_provinsi" id="nama_provinsi">
							<input type="hidden" name="nama_kota" id="nama_kota">
							<input type="hidden" name="nama_kecamatan" id="nama_kecamatan">
							<input type='hidden' name="biaya_ongkir" id ='biaya_ongkir' value="">
							<input type='hidden' name="harga_produk" id ='harga_produk' value="">
							<input type='hidden' name="nominal_transfer" id ='nominal_transfer' value="">
							<input type='hidden' name="desk" id ='desk' value="">

							<input type="text" name="user_id" value="{{$result['user_id']}}" hidden>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Nama</label>
									<div class="col-md-9">
										<input type="text" class="form-control" type="nama" name="nama" placeholder="Nama" value="{{$result['nama']}}">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Provinsi</label>
									<div class="col-md-9">
										<select name="province_id" id="prov" class="form-control select2">
											<option value="">-- Pilih Provinsi --</option>
											@for($i=0; $i < count($provinsi); $i++) { 
												<option value="{{ $provinsi[$i]['province_id'] }}" data-id="{{ $provinsi[$i]['province'] }}">
													{{ $provinsi[$i]['province'] }}
												</option>
											@endfor
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Kabupaten</label>
									<div class="col-md-9">
										<select name="city_id" id="city_id" class="form-control select2">
											<option value="">-- Pilih Kabupaten --</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Kecamatan</label>
									<div class="col-md-9">
										<select name="subdistrict_id" id="subdistrict_id" class="form-control select2">
											<option value="">-- Pilih Kecamatan --</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Alamat</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="alamat" name="alamat" value="{{$result['alamat']}}" placeholder="Alamat">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Tempat Lahir</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="alamat" name="tempat_lahir" value="{{$result['tempat_lahir']}}" placeholder="Tempat Lahir">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Tanggal Lahir</label>
									<div class="col-md-9">
										<input type="date" class="form-control" id="alamat" name="tanggal_lahir" value="{{$result['tanggal_lahir']}}" placeholder="TanggalLahir">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Jenis Kelamin</label>
									<div class="col-md-9">
										<select name="jns_kelamin" class="form-control select2 wide">
											<option value="L" @if($result['jns_kelamin'] == 'L') selected @endif>Laki-laki</option>
											<option value="P" @if($result['jns_kelamin'] == 'P') selected @endif>Perempuan</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Nomor HP</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="hp" name="hp" value="{{$result['hp']}}" placeholder="Nomor Hp">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Agama</label>
									<div class="col-md-9">
										<select name="agama" class="form-control select2 wide">
											<option value="islam" @if($result['agama'] == 'islam') selected @endif>Islam</option>
											<option value="kristen" @if($result['agama'] == 'kristen') selected @endif>Kristen</option>
											<option value="khatolik" @if($result['agama'] == 'khatolik') selected @endif>Khatolik</option>
											<option value="hindu" @if($result['agama'] == 'hindu') selected @endif>Hindu</option>
											<option value="budha" @if($result['agama'] == 'budha') selected @endif>Budha</option>
											<option value="konghucu" @if($result['agama'] == 'konghucu') selected @endif>Konghucu</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">NIK</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="hp" name="nik" value="{{$result['nik']}}" placeholder="NIK">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Kode Pos</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="hp" name="kode_pos" value="{{$result['kode_pos']}}" placeholder="Kode Pos">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Email</label>
									<div class="col-md-9">
										<input type="text" class="form-control" type="email" name="email" value="{{$result['user_mail']}}" placeholder="Email">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Nama Bank</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="nama_bank" value="{{$result['nama_bank']}}" placeholder="Nama Bank">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">No Rekening</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="norek" value="{{$result['norek']}}" placeholder="Nomor Rekening">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Nama Ahli Waris</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="ahli_waris" value="{{$result['ahli_waris']}}" placeholder="Nama Ahli Waris">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Hubungan</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="hubungan" value="{{$result['hubungan']}}" placeholder="Hubungan Dengan Ahli Waris">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Nomor HP Ahli Waris</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="no_ahli_waris" value="{{$result['no_ahli_waris']}}" placeholder="Nomor HP Ahli Waris">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Pilihan Hak Usaha</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="hu" value="member" readonly placeholder="Pilihan Hak Usaha">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Pilihan Produk</label>
									<div class="col-md-9">
										<select name="pil_produk" class="form-control select2 wide" id="pil_produk">
											<option value="">-- Pilih Produk --</option>
											@foreach($produk as $key => $pil_produk)
												<option value="{{$pil_produk['produk_id']}}">{{$pil_produk['nama']}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Nama / ID Sponsor</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="sponsor" value="LX1239766" readonly placeholder="Nama / ID Sponsor">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Kurir</label>
									<div class="col-md-9">
										<select name="kurir" id="kurir" class="form-control select2">
											<option value="">Pilih Kurir</option>
											<option value="jne">JNE</option>
											<option value="tiki">Tiki</option>
											<option value="pos">Pos</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label"></label>
									<div class="col-md-9">
										<label id="isi_ongkir"></label>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Nominal Transfer</label>
									<div class="col-md-9">
										<input type="text" name="jumlah_transfer" class="form-control" id="jumlah_transfer" value="" readonly>
									</div>
								</div>
								{{-- <input type='text' name="biaya_ongkir" id ='biaya_ongkir' value=""> --}}
								<div class="col-md-2 form-group" style="margin-left:50%">
									<button type="submit" value="submit" class="btn_3">
										Daftar
									</button>
								</div>
							</form>
						</div>
					
				</div>
			</div>
		</div>
	</section>
	
@push('ext_js')
<script>
    var selectedCity = "";
	var selectedKecamatan = "";

    $(document).ready(function(){
        $('#city_id').prop('disabled', 'disabled');
        $('#subdistrict_id').prop('disabled', 'disabled');
        $('#kurir').prop('disabled', 'disabled');
    });

    $(document).on("click", ".open-modal", function () {
        var produk_id = $(this).data('id');
        var produk_nama = $(this).data('name');
        $(".modal-body #produk_id").val(produk_id);
        document.getElementById("nm").innerHTML = produk_nama;
        // As pointed out in comments, 
        // it is unnecessary to have to manually call the modal.
        $('#open-modal').modal('show');
    });

    $("#prov").change(function () {
        var prov_id = $(this).val();
        $('#nama_provinsi').val($(this).find(':selected').data('id'));
        $.ajax({
            type: "POST",
            url: "{{ site_url('client/cart/get_kabupaten_by_prov/') }}",
            data: {
                'prov_id': prov_id
            },
            success: function (kota) {
                //aktifkan option kota
                $('#city_id').prop('disabled', false);
                $('select[name="city_id"]').empty();
                var i;
                var list_kota = JSON.parse(kota);
                $('select[name="city_id"]').append('<option value="">-- Pilih Kabupaten --</option>');
                for (i = 0; i < list_kota.length; i++) {
                    $('select[name="city_id"]').append('<option data-id="' + list_kota[i]['city_name'] + '" value="' + list_kota[i]['city_id'] +
                        '">' + list_kota[i]['city_name'] + '</option>');
                }
            }
        });
    });


    $("#city_id").change(function () {
        var city_id = $(this).val();
        $('#nama_kota').val($(this).find(':selected').data('id'));
        $.ajax({
            type: "POST",
            url: "{{ site_url('client/cart/get_kecamatan_by_kab/') }}",
            data: {
                'city_id': city_id
            },
            success: function (kecamatan) {
                //aktifkan option kecamatan
                $('#subdistrict_id').prop('disabled', false);
                $('select[name="subdistrict_id"]').empty();
                var i;
                var list_kecamatan = JSON.parse(kecamatan);
                $('select[name="subdistrict_id"]').append('<option value="">-- Pilih Kecamatan --</option>');
                for (i = 0; i < list_kecamatan.length; i++) {
                    $('select[name="subdistrict_id"]').append('<option data-id="' + list_kecamatan[i]['subdistrict_name'] + '" value="' + list_kecamatan[i]['subdistrict_id'] +
                        '">' + list_kecamatan[i]['subdistrict_name'] + '</option>');
                }
            }
        });
    });
        

   $("#subdistrict_id").change(function () {
        selectedKecamatan = $(this).val();
        $('#nama_kecamatan').val($(this).find(':selected').data('id'));
        $('#kurir').prop('disabled', false);
    });

    $("#kurir").change(function () {
        // var produk_id = [];
        // produk_id = $('.produk_id').val();
        console.log(selectedKecamatan);
        
        var kurir_nama = $(this).val();
        $.ajax({
            type: "POST",
            url: "{{ site_url('sistem/register_anggota/get_ongkir/') }}",
            data: {
                'kurir_nama': kurir_nama,
                'tujuan': selectedKecamatan, 
            },
            success: function (data) {
                var hasil = JSON.parse(data);
                //console.log(hasil);
                var i = 0;
                var radio = [];
                while (hasil[0]['costs'][i]) {
                        radio.push(`
                        <div class="alert alert-primary" role="alert">
                        <strong><input type="radio" name="kurir_service" data-id="`+ hasil[0]['costs'][i]['cost'][0]['value'] +`" data-waktu="` + hasil[0]['costs'][i]['cost'][0]['etd'] + `" data-desk="` + hasil[0]['costs'][i]['description'] + `" class="radio_kurir" value="`+ hasil[0]['costs'][i]['service']+`"> ` + hasil[0]['costs'][i]['service']+ `</strong>
                        <br> <b>Deskripsi :</b>  `+ hasil[0]['costs'][i]['description'] + ` <br> <b>Waktu Perkiraan : </b> ` + hasil[0]['costs'][i]['cost'][0]['etd'] + ` hari <br> <b>Biaya ongkos kirim : </b> <i>Rp. ` + Number(hasil[0]['costs'][i]['cost'][0]['value']).toLocaleString('ES-es') +` </i>.
                    </div>`);
                    i++;
                }
                document.getElementById('isi_ongkir').innerHTML =  radio.join(" ");
            }
        });
    });

	$("#pil_produk").change(function () {
        var produk_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "{{ site_url('sistem/register_anggota/get_harga_produk/') }}",
            data: {
                'produk_id': produk_id,
            },
            success: function (data) {
				$('#harga_produk').val(data);
            }
        });
    });

    $('body').on('click', '.radio_kurir', function() {
            $('#biaya_ongkir').val($(this).data('id'));
            $('#waktu_kirim').val($(this).data('waktu'));
            $('#desk').val($(this).data('desk'));
			var x = document.getElementById("harga_produk").value;
			var nominal_transfer = parseInt($(this).data('id')) + parseInt(1500000);
			$('#nominal_transfer').val(nominal_transfer);
			$('#jumlah_transfer').val("Rp. "+Number(nominal_transfer).toLocaleString('ES-es'));
    });

</script>
@endpush