<?php
include("koneksi.php");
$tamp = $_POST['tamp'];
$kode_bar = $tamp;
$sql = "SELECT *
    FROM tb_kbli
    where nama_kbli = '$kode_bar'";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

?>

        <label for="kk">Kode KBLI</label>
        <div class="form-group">
            <div class="form-line">
                <input readonly="readonly" id="kk" name="kk" type="text" class="form-control" value="<?php echo $row["kode_kbli"]; ?>">

                </input>


            </div>
        </div>
<?php
    }
} else {
    echo "0 results";
}

mysqli_close($db);

?>