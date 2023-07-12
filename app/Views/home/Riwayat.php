<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Before & After</title>
</head>

<body>
    <img src="/img/riwayat.png" class="img-fluid" alt="...">
    <div class="md:container md:mx-auto px-4 text-center mt-5 mb-5">
        <h2 class="text-head text-14px md:text-l md:text-center font-bold">Lihat Dan Cek Status Reservasi Anda Di Sini</h2>
        <p class="text-desc text-sm md:text-18px md:text-center mt-2">Jangan lupa #BAYAR setelah melakukan treatment!</p>
    </div>
    <div class="table-responsive mb-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Treatment</th>
                    <th scope="col">Tanggal Treatment</th>
                    <th scope="col">Sesi Treatment</th>
                    <th scope="col">Total Tagihan</th>
                    <th scope="col">Status Reservasi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($reservasi as $key => $res) { ?>
                    <tr>
                        <th scope="row"><?= ++$key ?></th>
                        <td><?= $res->username ?></td>
                        <td><?= $res->nama_treatment ?></td>
                        <td><?= $res->tgl_reservasi ?></td>
                        <td><?= $res->sesi_reservasi ?></td>
                        <td>Rp. <?= number_format($res->total, 0, '', '.') ?></td>
                        <td><?= $res->status_reservasi ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <br>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
</body>
</html>