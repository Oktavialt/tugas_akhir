<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facial</title>
</head>

<body>
    <img src="/img/CoverTreatment.png" class="img-fluid" alt="...">
    <!-- jenis treatment -->
    <div class="container my-5 mx-6">
        <div class="row row-cols-1 row-cols-md-3">
            <?php foreach($treatments as $treatment) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <?php
                            $image = ($treatment->gambar_treatment != '') ? $treatment->gambar_treatment : 'img/facial basic.jpg';
                        ?>
                        <img src="/<?= $image ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $treatment->nama_treatment ?></h5>
                            <p class="card-text"><?= $treatment->desc_treatment ?></p>
                            <!-- <a href="/Detail/FacialBasic" class="card-link">Detail</a><br> -->
                            <br><button type="button" class="btn btn-secondary" disabled>Rp. <?= number_format($treatment->harga_treatment, 0, '', '.') ?></button>
                            <?php
                                $detail_url = explode('(', $treatment->nama_treatment)[0];
                                $detail_url = str_replace(' ', '-', trim($detail_url));
                            ?>
                            <a href="/home/Detail/<?= $detail_url ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
</body>

</html>