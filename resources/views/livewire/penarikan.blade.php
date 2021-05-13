<div>
    <div class="form-group" wire:ignore>
        <label class="control-label mb-10">Nama Siswa</label>
        <select name="siswa_id" id="siswaId" class="form-control select2" @if($pnr) disabled @endif>
            <option value="{{ $pnr->tabungan->siswa->id ?? '' }}">{{ $pnr->tabungan->siswa->nama ?? '--Pilih Siswa--' }}</option>
            @foreach ($siswa as $sw)
            <option value="{{ $sw->id }}">{{ $sw->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label mb-10">Saldo</label>
        <input type="number" class="form-control" name="saldo"
            placeholder="Jumlah Saldo" value="{{ $pnr->saldo_awal ?? $saldo }}" readonly>
    </div>
    <div class="form-group">
        <label class="control-label mb-10">Jumlah Penarikan</label>
        <input type="number" wire:model="penarikan" class="form-control" name="jml_penarikan"
            placeholder="Masukkan Jumlah Penarikan" required
            value="{{ old('jml_penarikan') }}">
    </div>
</div>

@push('scripts')

<script>
    $(document).ready(function () {
        $('#siswaId').on('change', function (e) {
            var siswaId = $('#siswaId').val();
            @this.set('siswaid', siswaId);
        });
    });

</script>

@endpush
