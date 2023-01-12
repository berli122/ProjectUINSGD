<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body style="font-family: 'Times New Roman', Times, serif"></body>

<div class="container-fluid position-absolute top-50 start-50">
    <table>
        <td>
            <img src="{{ asset('assets/img/logo-uin.png') }}" alt="logo UIN" style="width: 100px; float: left;">

        </td>
        <td>
            <div style="text-align: right; text-align: center; font-size: 14pt; margin-top:10px;">
                KEMENTERIAN AGAMA <br>
                UNIVERSITAS ISLAM NEGERI <br>
                SUNAN GUNUNG DJATI BANDUNG <br>
                PUSAT TEKNOLOGI INFORMASI DAN <br>
                PANGKALAN DATA
            </div>
            <div style="text-align: center; font-size: 11pt;">
                Jl. A.H. Nasution No. 105 Cibiru Bandung 40614 🕿 (022) 7800525 <br>
                Fax.(022)7803936 Website: http://ptipd.uinsgd.ac.id
                E-mail: ptipd@uinsgd.ac.id
            </div>
        </td>
    </table>


    <hr size="5px" style="background-color: black; margin-bottom: 5px;">




    <div style="text-align: center; font-size: 13pt; margin-top:20px; margin-bottom: 10px;">
        <div class="text-center">
            <u>SURAT PERINTAH KERJA LEMBUR</u>
        </div>
        <div>
            Nomor : B-032/Un.05/II.4/PTIPD/PP.00.9/12/2022
        </div>
        <br>
        <br>
        <div style="text-align: start">
            Yang bertanda tangan dibawah ini Kuasa Pengguna Anggaran UIN Sunan Gunung Djati Bandung memerintahkan
            Kerja Lembur kepada pegawai tersebut di bawah ini untuk tanggal Desember 2022, dengan perincian
            pekerjaan sebagai berikut:
        </div>
        <br>
    </div>

    <div class="hide">
        {{ $no = 1 }}
    </div>
    <table class="table" border="1" width="100%" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Golongan</th>
            <th>Jabatan</th>
            <th>Jenis Pekerjaan</th>
        </thead>
        @foreach ($spk as $data)
            <tbody>
                <td>{{ $no++ }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->user->golongan->gol }} - {{ $data->user->golongan->name }}
                </td>
                <td>{{ $data->user->jabatan->name }}</td>
                <td>{{ $data->pekerjaan->des }}</td>
            </tbody>
        @endforeach
    </table>
    <br>
    <div style="margin-bottom: 30%">
        Demikian agar dilaksanakan dengan penuh rasa tanggung jawab.
    </div>
    <div style="float: left">
        <div style="margin-bottom: 75px">
            Bandung, Desember 2022 <br>
            An. Kuasa Pengguna Anggaran <br>
            Pejabat Pembuat Komitmen,

        </div>
    </div>
    <div style="float: right">
        <div>
            Bandung, Drs. H. Khoirudin, MM <br>
            NIP/NIK
        </div>
    </div>
</div>


</body>
<script type="text/javascript">
    window.print();
</script>

</html>
