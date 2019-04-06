@extends ('layouts.cobanavLogin')
@section('title', 'Pilih Metode Pembayaran | Aderim')

@section('js')
<script>
$(document)
    .ready(function() {
        $('.ui.form')
            .form({
                fields: {
                    bank_pengirim: {
                        identifier: 'bank_pengirim',
                        rules: [{
                            type: 'empty',
                            prompt: 'Metode pembayaran tidak boleh kosong'
                        }]
                    },
                    namaRek: {
                        identifier: 'namaRek',
                        rules: [{
                            type: 'empty',
                            prompt: 'Nama rekening tidak boleh kosong'
                        }]
                    },
                    noRek: {
                        identifier: 'noRek',
                        rules: [{
                            type: 'empty',
                            prompt: 'Nomor rekening tidak boleh kosong'
                        }]
                    }
                }
            });
    });
</script>
@endsection

@section('content')
<div class="ui container" style="color:#4d4d4d;margin-top:50px">
    <div style="max-width:700px;margin: 0 auto;border:1px solid #e1e2e3;border-radius:6px;padding:40px 45px 40px 45px">
        <div style="font-size:24px;line-height:1"><b>Pilih Metode Pembayaran</b></div>
        <form class="ui form" style="margin-top:15px" id="tambah-transaksi" method='post'
            action="{{url('/tambah-transaksi')}}" enctype="multipart/form-data">
            <div class="field">
                <label style="font-size:18px">Total Pembayaran</label>
                <div class="ui labeled fluid input" style="font-size:18px">
                    <label class="ui label">Rp</label>
                    <input type="text" name="estimasi"
                        value="{{number_format((($dataTransaksi->jumlah)*(0.25)),0,",",".")}}" readonly
                        style="background-color:#e8e8e8;border:none">
                    <input type="hidden" name="id_transaksi" value="{{$dataTransaksi->id}}" />
                </div>
            </div>
            <div class="field">
                <label style="font-size:18px">Metode Pembayaran</label>
                <div class="ui divider"></div>
                <div class="ui dropdown selection">
                    <select name="bank_pengirim">
                        <option value=""></option>
                        <option value="BCA"></option>
                        <option value="MANDIRI"></option>
                        <option value="BRI"></option>
                        <option value="BNI"></option>
                        <option value="CIMB"></option>
                    </select>
                    <i class="dropdown icon"></i>
                    <div class="default text">
                        <div style="font-size:18px">
                            <b>Pilih Metode Pembayaran</b>
                        </div>
                    </div>
                    <div class="menu fluid">
                        <div class="item" data-value="BCA">
                            <div style="display:flex;flex-direction:row;align-items:center;padding:5px 10px 5px 10px">
                                <div>
                                    <img class="ui tiny image" src="{{asset('bankbca.png')}}">
                                </div>
                                <div style="font-size:17px;font-weight:bold;margin-left:40px">
                                    Transfer BCA
                                </div>
                            </div>
                        </div>
                        <div class="item" data-value="MANDIRI">
                            <div style="display:flex;flex-direction:row;align-items:center;padding:5px 10px 5px 10px">
                                <div>
                                    <img class="ui tiny image" src="{{asset('bankmandiri.png')}}">
                                </div>
                                <div style="font-size:17px;font-weight:bold;margin-left:40px">
                                    Transfer Mandiri
                                </div>
                            </div>
                        </div>
                        <div class="item" data-value="BRI">
                            <div style="display:flex;flex-direction:row;align-items:center;padding:5px 10px 5px 10px">
                                <div>
                                    <img class="ui tiny image" src="{{asset('bankbri.png')}}">
                                </div>
                                <div style="font-size:17px;font-weight:bold;margin-left:40px">
                                    Transfer BRI
                                </div>
                            </div>
                        </div>
                        <div class="item" data-value="BNI">
                            <div style="display:flex;flex-direction:row;align-items:center;padding:5px 10px 5px 10px">
                                <div>
                                    <img class="ui tiny image" src="{{asset('bankbni.png')}}">
                                </div>
                                <div style="font-size:17px;font-weight:bold;margin-left:40px">
                                    Transfer BNI
                                </div>
                            </div>
                        </div>
                        <div class="item" data-value="CIMB">
                            <div style="display:flex;flex-direction:row;align-items:center;padding:5px 10px 5px 10px">
                                <div>
                                    <img class="ui tiny image" src="{{asset('bankcimb.png')}}">
                                </div>
                                <div style="font-size:17px;font-weight:bold;margin-left:40px">
                                    Transfer CIMB
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui divider"></div>
            </div>
            <div class="field">
                <label style="font-size:18px">Nama Rekening Anda</label>
                <input type="text" name="namaRek" placeholder="Contoh: Budi">
            </div>
            <div class="field">
                <label style="font-size:18px">Nomor Rekening Anda</label>
                <input type="text" name="noRek" placeholder="Contoh: 123456">
            </div>
            {{csrf_field()}}
            <button class="ui big teal button fluid" onclick="" type="submit" name="submit" style="margin-top:40px">
                Bayar
            </button>
            <div class="ui error message">
                <ul class="list">
                </ul>
            </div>
        </form>
    </div>
</div>

@include('layouts.cobafooter')
@endsection