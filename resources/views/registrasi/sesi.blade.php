<div class="modal fade" id="sesi" tabindex="-1" role="dialog" aria-labelledby="sesiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="sesiLabel">Sesi Pendaftaran</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Sesi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sesi_registrasi_url as $i => $s)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td><a href="{{ url('registrasi?move_to_session='.$s) }}">Pindah Ke Sesi {{ $i+1 }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-3 text-center">
                    <button class="text-primary" style="background: none; border: none;" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Sesi pendaftaran berisikan history pendaftar, Sesi pendaftaran memungkinkan pengguna untuk melihat pendaftaran yang telah diajukan sebelumnya.">
                        Apa itu sesi pendaftaran?
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>