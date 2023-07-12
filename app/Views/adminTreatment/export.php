<style>
    @page {
        size: landscape;
    }

    .center-table,
    .right-table {
        width: 100%;
        table-layout: fixed;
    }

    .center-table tr {
        text-align: center;
    }

    .right-table tr {
        text-align: right;
    }

    .center-table td {
        vertical-align: middle;
        width: 100%;
    }

    .treatment-table {
        margin-top: 1rem;
        border-collapse: collapse;
        border: 1px solid black;
    }

    .treatment-table thead th,
    .treatment-table tbody td {
        padding: 0.5rem;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    .treatment-table th,
    .treatment-table td {
        padding: 0.5rem;
        border-right: 1px solid black;
    }
</style>

<table class="table center-table">
    <tbody>
        <tr>
            <td>LAPORAN DATA TREATMENT</td>
        </tr>
        <tr>
            <td>KLINIK ADIVA BEAUTY SKIN</td>
        </tr>
        <tr>
            <td>Green Pusaka Residence Blok A8, Jln. Rajawali, Maospati</td>
        </tr>
    </tbody>
</table>

<table class="table center-table treatment-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Treatment</th>
            <th>Jenis Treatment</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataTreatment as $key => $treatment) : ?>
            <tr>
                <td><?= ++$key ?>.</td>
                <td><?= $treatment->nama_treatment ?></td>
                <td><?= $treatment->jenis_treatment ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>