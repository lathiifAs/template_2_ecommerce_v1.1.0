@if (!empty($tipe))
    @if($tipe == 'Sukses')
    <div class="alert alert-success" style="margin-top: 20px">
        <label ><strong>{{ $tipe }},</strong> {{ $pesan }}</label>
    </div>
    @else
    <div class="alert alert-danger" style="margin-top: 20px">
        <label ><strong>{{ $tipe }},</strong> {{ $pesan }}</label>
    </div>
    @endif
@endif