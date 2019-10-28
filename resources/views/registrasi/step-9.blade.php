@extends('master')

@section('title', 'Registrasi')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/swal.css') }}">
    <style>
        body {
            background: #1e88e5;   
        }

        .register-box {
            box-shadow: 0px 0px 8px 2px rgba(9,101,181,1);
        }

        h5 {
            padding: 10px 20px;
            background: #fff31c;
        }

        .tingkat {
            background: #ff8921;
            color: white;
            border-radius: 15px;
            display: inline-block;
            padding: 5px 20px;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .pilihan-tingkat {
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <div class="container p-0 bg-white register-box mt-3">
        <h5 class="m-0"><img height='40' src="https://img.icons8.com/dotty/80/000000/note.png"> Registrasi</h5>
        @if($reg->saved == 1)
            <div class="text-right m-3">
                <a target='_blank' href="{{ url('pdf/registrasi-form/'.$reg->id) }}" class="btn btn-success"><i class='fa fa-pdf'></i> Unduh PDF</a>
            </div>
        @endif
        @if($reg->saved == 1)
            <div class="m-2 alert alert-warning">Data telah disimpan dan tak dapat diubah.</div>
        @endif
        {{-- ----------------------------------------- STEP 1 ----------------------------------------- --}}
        <form action="{{ url('registrasi/1') }}" class="p-3" method="POST">
            <div class="my-1" style="color: #707070">
                Kelas Tujuan Yang Dipilih
            </div>
            <div class='my-1 tingkat'>{{ $tingkat }}</div>
            @csrf
            @method('POST')
        </form>
        {{-- ----------------------------------------- END OF STEP 1 ----------------------------------------- --}}
        {{-- ----------------------------------------- STEP 2 ----------------------------------------- --}}
        <form action="{{ url('registrasi/2') }}" class="px-3" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-sm-8">
                    <label>Nama</label>
                    <input readonly name="nama" type="text" class="form-control" value="{{ old('nama') ? old('nama') : $reg->nama }}">
                </div>
                <div class="form-group col-sm-4">
                    <label>Jenis Kelamin</label>
                    <input readonly name="nama" type="text" class="form-control" value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : $reg->jenis_kelamin }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Tempat Lahir</label>
                    <input readonly name="tempat_lahir" type="text" class="form-control" value="{{ old('tempat_lahir') ? old('tempat_lahir') : $reg->tempat_lahir }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>Tanggal Lahir</label>
                    <input readonly name="tanggal_lahir" type="date" class="form-control" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $reg->tanggal_lahir }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Agama</label>
                    <select readonly name="agama" id="" class="form-control">
                        <option value="">Pilih Agama</option>
                        <option value="Kristen" {{ (old('agama') ? old('agama') : $reg->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ (old('agama') ? old('agama') : $reg->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Islam" {{ (old('agama') ? old('agama') : $reg->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label>Kewarganegaraan</label>
                    <input type="text" value="{{ old('kewarganegaraan') ? old('kewarganegaraan') : $reg->kewarganegaraan }}" name="kewarganegaraan" class="form-control" readonly>
                </div>
            </div>
            @if($reg->agama == 'Kristen' || $reg->agama == 'Katolik')
                <div class="row" id="tambahan-kristen">
                    <div class="form-group col-sm-6">
                        <label>Jika Kristen / Katolik Bergereja di</label>
                        <input type="text" class='form-control' name='bergereja_di' value="{{ old('bergereja_di') ? old('bergereja_di') : $reg->bergereja_di }}" readonly>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Aktif / Pelajayan sebagai</label>
                        <input type="text" class='form-control' name='aktif_pelayan' value="{{ old('aktif_pelayan') ? old('aktif_pelayan') : $reg->aktif_pelayan }}" readonly>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Alamat Rumah</label>
                    <textarea name="alamat_rumah" type="text" class="form-control" readonly>{{ old('alamat_rumah') ? old('alamat_rumah') : $reg->alamat_rumah }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Kode Pos</label>
                    <input name="kode_pos" type="text" class="form-control" value="{{ old('kode_pos') ? old('kode_pos') : $reg->kode_pos }}" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label>Telepon</label>
                    <input name="telepon" type="text" class="form-control" value="{{ old('telepon') ? old('telepon') : $reg->telepon }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Tinggal Dengan</label>
                    <br>
                    <input type="text" class="form-control" value="{{ $reg->tinggal_dengan }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>No Hp Calon Siswa</label>
                    <input disabled type="text" name="no_hp_calon_siswa" class="form-control" value="{{ old('no_hp_calon_siswa') ? old('no_hp_calon_siswa') : $reg->no_hp_calon_siswa }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>Alamat E-mail Calon Siswa</label>
                    <input disabled name="email_calon_siswa" type="text" class="form-control" value="{{ old('email_calon_siswa') ? old('email_calon_siswa') : $reg->email_calon_siswa }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Anak Keberapa dalam keluarga</label>
                    <input disabled name="anak_ke" type="text" class="form-control" value="{{ old('anak_ke') ? old('anak_ke') : $reg->anak_ke }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>Jumlah Saudara Kandung / Angkat</label>
                    <input disabled name="jumlah_saudara" type="text" class="form-control" value="{{ old('jumlah_saudara') ? old('jumlah_saudara') : $reg->jumlah_saudara }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12" id="saudara-section">
                    <label>Saudara Kandung / angkat yang masih sekolah</label>
                    <table class="table table-responsive-sm w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="min-width: 200px">Nama</th>
                                <th>Umur</th>
                                <th style="min-width: 200px">Pendidikan</th>
                                <th style="min-width: 100px">Status</th>
                            </tr>
                            @foreach($saudara as $i => $s)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $s->saudara_nama }}</td>
                                    <td>{{ $s->saudara_umur }}</td>
                                    <td>{{ $s->saudara_pendidikan }}</td>
                                    <td>{{ $s->saudara_status }}</td>   
                                </tr>
                            @endforeach                           
                        </thead>
                    </table>
                    @if(session('saudara-error'))
                        @foreach($errors->all() as $a)
                            <p class="text-danger">{{ $a }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label>Jarak Tempuh Ke sekolah</label>
                    <div class="input-group mb-3">
                        <input name="jarak_tempuh_sekolah" disabled type="text" value="{{ old('jarak_tempuh_sekolah') ? old('jarak_tempuh_sekolah') : $reg->jarak_tempuh_sekolah }}" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">KM</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label>Waktu tempuh ke Sekolah</label>
                    <div class="input-group mb-3">
                        <input name="waktu_tempuh_sekolah" disabled value="{{ old('waktu_tempuh_sekolah') ? old('waktu_tempuh_sekolah') : $reg->waktu_tempuh_sekolah }}" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Menit</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label>Alat tempuh ke Sekolah</label><br>
                    <input type="text" class="form-control" value="{{ $reg->alat_tempuh_sekolah }}" disabled>
                </div>
            </div>            
        </form>
        {{-- ----------------------------------------- END OF STEP 2 ----------------------------------------- --}}
          {{-- ----------------------------------------- STEP 3 ----------------------------------------- --}}
        <form action="{{ url('registrasi/3') }}" class="px-3" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Asal Sekolah</label>
                <input name="asal_sekolah" type="text" class="form-control" value="{{ old('asal_sekolah') ? old('asal_sekolah') : $reg->asal_sekolah }}" readonly>
            </div>
            <div class="form-group">
                <label>Alamat Sekolah</label>
                <textarea name="alamat_sekolah" id="" class="form-control" readonly>{{ old('alamat_sekolah') ? old('alamat_sekolah') : $reg->alamat_sekolah }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Nomor Ijasah</label>
                    <input name="nomor_ijazah" value="{{ old('nomor_ijazah') ? old('nomor_ijazah') : $reg->nomor_ijazah }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label>Lama Belajar</label>
                    <input name="lama_belajar" value="{{ old('lama_belajar') ? old('lama_belajar') : $reg->lama_belajar}}" type="text" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group">
                <label>Jumlah Nilai Ijasah</label>
                <input name="jumlah_nilai_ijazah" value="{{ old('jumlah_nilai_ijazah') ? old('jumlah_nilai_ijazah') : $reg->jumlah_nilai_ijazah }}"  type="text" class="form-control" readonly>
            </div>
            @csrf
        </form>
        {{------------------------------------------- END OF STEP 3 -------------------------------------------}}
        {{------------------------------------------- STEP 4 -------------------------------------------}}
        <form action="{{ url('registrasi/4') }}" class="px-3" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Golongan Darah</label>
                    <input type="text" value="{{ $reg->golongan_darah }}" readonly class="form-control">
                </div>
                <div class="form-group col-sm-6">
                    <label>Pernah Melakukan Donor</label>
                    <input type="text" value="{{ $reg->pernah_melakukan_donor ? 'Tidak' : 'Pernah' }}" readonly class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Penyakit Yang Pernah di derita</label>
                    <input readonly type="text" name="penyakit_yang_pernah_diderita" value="{{ old('penyakit_yang_pernah_diderita') ? old('penyakit_yang_pernah_diderita') : $reg->penyakit_yang_pernah_diderita }}" class="form-control" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label>Berkebutuhan Khusus</label>
                    <input type="text" name="berkebutuhan_khusus" value="{{ old('berkebutuhan_khusus') ? old('berkebutuhan_khusus') : $reg->berkebutuhan_khusus }}" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Tinggi Badan</label>
                    <div class="input-group mb-3">
                        <input readonly type="text" class="form-control" name="tinggi_badan" value="{{ old('tinggi_badan') ? old('tinggi_badan') : $reg->tinggi_badan }}" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">CM</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label>Berat Badan</label>
                    <div class="input-group mb-3">
                        <input readonly type="text" name="berat_badan" value="{{ old('berat_badan') ? old('berat_badan') : $reg->berat_badan }}" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">KG</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Ciri khusus lainnya</label>
                <textarea readonly class="form-control" name="ciri_khusus_lainnya">{{ old('ciri_khusus_lainnya') ? old('ciri_khusus_lainnya') : $reg->ciri_khusus_lainnya }}</textarea>
            </div>
        </form>
        {{------------------------------------------- END OF STEP 4 -------------------------------------------}}
        {{------------------------------------------- STEP 5 -------------------------------------------}}
        {{------------------------------------------- STEP 6 -------------------------------------------}}
        <form action="{{ url('registrasi/6') }}" class="px-3" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tinggal Bersama</label>
                <input type="text" class="form-control" name="tinggal_bersama" value="{{ $reg->tinggal_bersama == 'orang_tua' ? 'Orang Tua' : '' }}" readonly>
            </div>
            @if($reg->tinggal_bersama == 'orang_tua')
                <div class="title my-3">Ayah</div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input name="nama_ayah" value="{{ old('nama_ayah') ? old('nama_ayah') : ($ayah ? $ayah->nama : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Tempat Lahir</label>
                        <input name="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah') ? old('tempat_lahir_ayah') : ($ayah ? $ayah->tempat_lahir : '') }}" type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Tanggal Lahir</label>
                        <input name="tanggal_lahir_ayah" value="{{ old('tanggal_lahir_ayah') ? old('tanggal_lahir_ayah') : ($ayah ? $ayah->tanggal_lahir : '') }}" type="date" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select name="agama_ayah" class="form-control" disabled>
                        <option {{ (old('agama_ayah') ? old('agama_ayah') : ($ayah ? $ayah->agama : '')) == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                        <option {{ (old('agama_ayah') ? old('agama_ayah') : ($ayah ? $ayah->agama : '')) == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                        <option {{ (old('agama_ayah') ? old('agama_ayah') : ($ayah ? $ayah->agama : '')) == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kewarganegaraan</label>
                    <input name="kewarganegaraan_ayah" value="{{ old('kewarganegaraan_ayah') ? old('kewarganegaraan_ayah') : ($ayah ? $ayah->kewarganegaraan : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Pendidikan Terakhir</label>
                    <input value="{{ old('pendidikan_terakhir_ayah') ? old('pendidikan_terakhir_ayah') : ($ayah ? $ayah->pendidikan_terakhir : '') }}" name="pendidikan_terakhir_ayah" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Pekerjaaan / Jabatan</label>
                    <input name="pekerjaan_jabatan_ayah" value="{{ old('pekerjaan_jabatan_ayah') ? old('pekerjaan_jabatan_ayah') : ($ayah ? $ayah->pekerjaan_jabatan : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat_lengkap_ayah" class="form-control" readonly>{{ old('alamat_lengkap_ayah') ? old('alamat_lengkap_ayah') : ($ayah ? $ayah->alamat_lengkap : '') }}</textarea>
                </div>
                <div class="form-group">
                    <label>No telepon / HP</label>
                    <input name="no_telepon_ayah" value="{{ old('no_telepon_ayah') ? old('no_telepon_ayah') : ($ayah ? $ayah->no_telepon : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <br>
                    <input type="text" class="form-control" value="{{ $ayah->keterangan }}" readonly>
                </div>
                <div class="form-group">
                    <label>Penghasilan perbulan</label>
                    <input type="text" readonly class="form-control" value="{{ $penghasilan_ayah }}">
                </div>
                <div class="title my-3">Ibu</div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input name="nama_ibu" value="{{ old('nama_ibu') ? old('nama_ibu') : ($ibu ? $ibu->nama : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Tempat Lahir</label>
                        <input name="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu') ? old('tempat_lahir_ibu') : ($ibu ? $ibu->tempat_lahir : '') }}" type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Tanggal Lahir</label>
                        <input name="tanggal_lahir_ibu" value="{{ old('tanggal_lahir_ibu') ? old('tanggal_lahir_ibu') : ($ibu ? $ibu->tanggal_lahir : '') }}" type="date" class="form-control" readonly>

                    </div>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select disabled name="agama_ibu" class="form-control" id="">
                        <option {{ (old('agama_ibu') ? old('agama_ibu') : ($ibu ? $ibu->agama : '')) == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                        <option {{ (old('agama_ibu') ? old('agama_ibu') : ($ibu ? $ibu->agama : '')) == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                        <option {{ (old('agama_ibu') ? old('agama_ibu') : ($ibu ? $ibu->agama : '')) == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kewarganegaraan</label>
                    <input name="kewarganegaraan_ibu" value="{{ old('kewarganegaraan_ibu') ? old('kewarganegaraan_ibu') : ($ibu ? $ibu->kewarganegaraan : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Pendidikan Terakhir</label>
                    <input name="pendidikan_terakhir_ibu" value="{{ old('pendidikan_terakhir_ibu') ? old('pendidikan_terakhir_ibu') : ($ibu ? $ibu->pendidikan_terakhir : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Pekerjaaan / Jabatan</label>
                    <input name="pekerjaan_jabatan_ibu" value="{{ old('pekerjaan_jabatan_ibu') ? old('pekerjaan_jabatan_ibu') : ($ibu ? $ibu->pekerjaan_jabatan : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat_lengkap_ibu" class="form-control" readonly>{{ old('alamat_lengkap_ibu') ? old('alamat_lengkap_ibu') : ($ibu ? $ibu->alamat_lengkap : '') }}</textarea>
                </div>
                <div class="form-group">
                    <label>No telepon / HP</label>
                    <input name="no_telepon_ibu" value="{{ old('no_telepon_ibu') ? old('no_telepon_ibu') : ($ibu ? $ibu->no_telepon : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <br>
                    <input type="text" class="form-control" value="{{ $ibu->keterangan }}" readonly>
                </div>
                <div class="form-group">
                    <label>Penghasilan perbulan</label>
                    <input type="text" readonly class="form-control" value="{{ $penghasilan_ibu }}">
                </div>
                <hr>
            @endif
            @if($reg->tinggal_bersama == 'wali')
                <div class="title my-3">Wali</div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input name="nama_wali" value="{{ old('nama_wali') ? old('nama_wali') : ($wali ? $wali->nama : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Tempat Lahir</label>
                        <input value="{{ old('tempat_lahir_wali') ? old('tempat_lahir_wali') : ($wali ? $wali->tempat_lahir : '') }}" name="tempat_lahir_wali" type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Tanggal Lahir</label>
                        <input value="{{ old('tanggal_lahir_wali') ? old('tanggal_lahir_wali') : ($wali ? $wali->tanggal_lahir : '') }}" name="tanggal_lahir_wali" type="date" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select name="agama_wali" class="form-control" disabled>
                        <option {{ (old('agama_wali') ? old('agama_wali') : ($wali ? $wali->agama : '')) == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                        <option {{ (old('agama_wali') ? old('agama_wali') : ($wali ? $wali->agama : '')) == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                        <option {{ (old('agama_wali') ? old('agama_wali') : ($wali ? $wali->agama : '')) == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kewarganegaraan</label>
                    <input name="kewarganegaraan_wali" value="{{ old('kewarganegaraan_wali') ? old('kewarganegaraan_wali') : ($wali ? $wali->kewarganegaraan : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Pendidikan Terakhir</label>
                    <input value="{{ old('pendidikan_terakhir_wali') ? old('pendidikan_terakhir_wali') : ($wali ? $wali->pendidikan_terakhir : '') }}" name="pendidikan_terakhir_wali" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Pekerjaaan / Jabatan</label>
                    <input value="{{ old('pekerjaan_jabatan_wali') ? old('pekerjaan_jabatan_wali') : ($wali ? $wali->pekerjaan_jabatan : '') }}" name="pekerjaan_jabatan_wali" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat_lengkap_wali" class="form-control" readonly>{{ old('alamat_lengkap_wali') ? old('alamat_lengkap_wali') : ($wali ? $wali->alamat_lengkap : '') }}</textarea>
                </div>
                <div class="form-group">
                    <label>No telepon / HP</label>
                    <input name="no_telepon_wali" value="{{ old('no_telepon_wali') ? old('no_telepon_wali') : ($wali ? $wali->no_telepon : '') }}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <br>
                    <input type="text" class="form-control" value="{{ $wali->keterangan }}" readonly>
                </div>
                <div class="form-group">
                    <label>Penghasilan perbulan</label>
                    <input type="text" readonly class="form-control" value="{{ $penghasilan_wali }}" readonly>
                </div>
            @endif
        </form>
        {{------------------------------------------- END OF STEP 6 -------------------------------------------}}
        {{------------------------------------------- STEP 7 -------------------------------------------}}
        <div class="px-3">
            <table class="table table-responsive-sm w-100">
                <thead>
                    <tr>
                        <th>Nama Dokumen</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokumen as $d)
                        <tr>
                            <td>{{ $d->jenis_dokumen->nama }}</td>
                            <td><a href="{{ $d->url }}">Unduh</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{------------------------------------------- END OF STEP 7 -------------------------------------------}}
        @if($reg->saved !== 1)
            <div  method="POST" class="p-3 d-flex justify-content-end">
                <a href="{{ url('registrasi?goto=prev') }}" class="btn btn-info">Kembali</a>
                <input type="submit" class="ml-2 btn btn-warning" value="Simpan" id="btn-simpan">
            </div>
        @endif

        <form  action="{{ url('registrasi/9') }}" id="form-simpan" method="POST">
            @csrf
            @method('POST')
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/swal.js') }}"></script>
    <script>
        $('#btn-simpan').click(function(e) {
            e.preventDefault();
            Swal.fire({
                    title: 'Anda yakin ingin melakukan konfirmasi?',
                    text: "Data yang telah masuk kedalam sistem tidak akan dapat diubah kembali.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Konfirmasi',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        $('#form-simpan').submit();
                    }
            });
            
        });
    </script>
@endsection