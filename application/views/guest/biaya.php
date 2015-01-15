<h3>Biaya Pengiriman</h3>
<p>
    Berikut adalah daftar biaya pengiriman yang berlaku. 
    Perhitungan biaya berdasarkan kepada tempat asal dan tujuan pengiriman, serta berdasarkan dengan
    total berat barang yang ingin Anda kirim.
</p>
<form method="post" action="<?php echo base_url(); ?>index.php/page/cek_biaya_pengiriman">
  <table>
    <tr>
      <td>Kota Asal</td>
      <td>:</td>
      <td>
        <select name="cbKotaAsal" disabled>
          <option value="1">Surabaya</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Kota Tujuan</td>
      <td>:</td>
      <td>
        <select name="cbKotaTujuan">
          <?php
          foreach ($kota as $data) {
            echo "<option value='".$data['id_kota']."'>".$data['nama_kota']."</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <!--<tr>
      <td>Berat Total</td>
      <td>:</td>
      <td>
        <select>
          <option>Antara 100 s/d 199 kg</option>
          <option>Antara 200 s/d 299 kg</option>
          <option>Antara 300 s/d 399 kg</option>
          <option>Antara 400 s/d 499 kg</option>
          <option>Lebih dari 500 kg</option>
        </select>
      </td>
    </tr>-->
    <tr>
      <td></td>
      <td></td>
      <td>
        <button type="submit" class="btn btn-primary">
        Cek Biaya</button>
      </td>
    </tr>
  </table>

  <table class="table table-hover">
    </caption>
    <thead>
      <tr>
        <th>Kota Asal</th>
        <th>Kota Tujuan</th>
        <th>Total Berat</th>
        <th>Biaya</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        if (count($biaya) > 0) {
          $idx = 1;
          foreach ($biaya as $list) {
            echo "<tr>";
            echo "<td>Surabaya</td>";
            echo "<td>".$list['nama_kota']."</td>";
            echo "<td>".$list['total_berat']." Kg</td>";
            echo "<td>Rp".number_format($list['biaya'], 0, ",", ".").",00</td>";
            echo "</tr>";
            $idx++;
          }
        } else {
          echo "<tr><td colspan='4'>Tidak ada data yang bisa ditampilkan.</td></tr>";
        }
        ?>
    </tbody>
  </table>
</form>
<blockquote>
  Jika ada yang ingin Anda tanyakan langsung mengenai biaya pengiriman, silahkan menghubungi Customer Service.
</blockquote>