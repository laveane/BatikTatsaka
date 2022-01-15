<?php
    include 'header.php'
?>

<section class="my-orders">
    <div class="container">
        <h4 class="title text-center">Pesanan Saya</h4>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Status Pesanan</th>
                        <th>Harga Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        $result = mysqli_query($conn, "SELECT * FROM produksi WHERE kode_customer = '$_SESSION[kd_cs]'");
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $nomor++ ?></td>
                        <td><?= $row['invoice'] ?></td>
                        <td>
                            <?php
                                if($row['tolak'] == 1) {
                                    echo "<span class='text-success'>Pesanan diproses</span>";
                                } else if($row['terima'] == 0) {
                                    echo "<span class='text-dark'>Menunggu proses admin</span>";
                                } else {
                                    echo "<span class='text-success'>Pesanan diproses</span>";
                                }
                            ?>
                        </td>
                        <td>Rp. <?= number_format($row['grand_total']) ?></td>
                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#mymodal<?= $row['id_order'] ?>" class="btn btn-primary btn-sm">
                                Detail pesanan
                            </button>
                            <?php
                                $d_order = mysqli_query($conn, "SELECT * FROM produksi WHERE invoice = '$row[invoice]'");
                                $t_order = mysqli_fetch_assoc($d_order);

                                $sortage = mysqli_query($conn, "SELECT * FROM produksi where cek = '1'");
                                $cek_sor = mysqli_num_rows($sortage);

                                // customer
                                $cs = mysqli_query($conn, "SELECT * FROM customer WHERE kode_customer = '".$t_order['kode_customer']."'");
                                $t_cs = mysqli_fetch_assoc($cs);
                            ?>

                            <div class="modal fade" id="mymodal<?= $row['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <span style="margin-right: 200px;" class="modal-title"
                                                id="myModalLabel">#<?= $t_order['invoice']; ?></span>
                                            <span class="modal-title text-right">Batas Pembayaran :
                                                <?php echo $t_order['tanggal']; ?></span>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Data Customer</h4>
                                            <table class="table">
                                                <tr>
                                                    <td>Invoice</td>
                                                    <td><?= $t_order['invoice']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Customer</td>
                                                    <td><?= $t_order['kode_customer']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td><?= $t_cs['nama']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td><?php echo  $t_order['alamat'].",".$t_order['kota']." ".$t_order['provinsi'].",".$t_order['kode_pos']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No Telp</td>
                                                    <td><?= $t_cs['telp']; ?></td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <h4>Ekspedisi/Pengiriman</h4>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Ekspedisi</th>
                                                    <th>Paket Ekspedisi</th>
                                                </tr>
                                                <tr>
                                                    <td><?= strtoupper($t_order['ekspedisi']);  ?></td>
                                                    <td><?= $t_order['paket_ekspedisi'];  ?></td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <h4>List Order</h4>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Ukuran</th>
                                                    <th>Harga</th>
                                                    <th>qty</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                                <?php
                                                    $order = mysqli_query($conn, "SELECT * FROM produksi WHERE invoice = '$row[invoice]'");
                                                    $no = 1;
                                                    $grand = 0;
                                                    while ($list = mysqli_fetch_assoc($order)) {
                                                ?>
                                                <tr>
                                                    <td><?= $no;  ?></td>
                                                    <td><?= $list['kode_produk']; ?></td>
                                                    <td><?= $list['nama_produk']; ?></td>
                                                    <td><?= strtoupper($list['ukuran']); ?></td>
                                                    <td><?= number_format($list['harga'], 0, ".", ".");  ?></td>
                                                    <td><?= $list['qty'];  ?></td>
                                                    <td><?= number_format($list['harga']*$list['qty'], 0, ".", ".");  ?></td>
                                                </tr>
                                                <?php 
                                                        $sub = $list['harga'] * $list['qty'];
                                                        $grand += $sub;
                                                        $no++;
                                                        $grands = $list['grand_total'];
                                                        $tf = $list['images'];
                                                        $ong = $list['ongkir'];
                                                    }
                                                ?>
                                                <tr>
                                                    <td colspan="7" class="text-right alert alert-warning"><b>Grand Total =
                                                            <?= number_format($grand+$ong, 0, ".", ".");  ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7" class="text-right alert alert-success"><b>Nominal yang
                                                            dibayar = <?= number_format($grands+$ong, 0, ".", ".");  ?></b></td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <h4>Bukti Transfer</h4>
                                            <?php 
                                                if(!empty($tf)){
                                            ?>

                                            <img src="admin/image/tf/<?php echo $tf; ?>" width="300">

                                            <?php
                                                }else{
                                            ?>

                                            <p>Tidak Ada Bukti Transfer yang di upload</p>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-bs-dismiss="modal" class="btn btn-default">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
    include 'footer.php'
?>