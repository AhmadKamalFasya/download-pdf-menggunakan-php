<?php
include "koneksi.php";
?>
<h3>Membuat Script Download File Dengan PHP MySQL - Tutorial</h3>
<b>Daftar File</b>
<br />
<br />
<table border="1" cellpadding="3">
  <tr>
    <th width="30">No</th>
    <th width="180">Nama File</th>
    <th width="80">Action</th>
  </tr>
  <?php
  $no = 0;
  $query = "SELECT * FROM file";
  $row = mysqli_query($link, $query);

  while ($data = mysqli_fetch_array($row)) {
    $no++
  ?>
    <tr>
      <td><?= $no ?></td>
      <td><?php echo $data['nama_file']; ?></td>
      <td>
        <a href="download.php?filename=<?= $data['nama_file']; ?>">Download</a>
        <a href="edit.php?filename=<?= $data['nama_file']; ?>">Edit</a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>

<h1>Input</h1>
<form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="insert">Input</button>
</form>

<h1>Edit</h1>
<form action="edit.php" method="POST" enctype="multipart/form-data">
  <?php while ($data = mysqli_fetch_assoc($row)) { ?>
    <input type="file" name="file_lama" value="<?= $data['nama_file']; ?>">
  <?php } ?>
  <input type="file" name="file">
  <button type="submit" name="update">Input</button>
</form>