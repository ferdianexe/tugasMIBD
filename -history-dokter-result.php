<table>
    <tr>
        <th>WAKTU TEMU</th>
        <th>CATATAN</th>
    </tr>
    <?php
        $usrn = $_GET['username'];
        $idDokter = $_SESSION['idDokter'];
        $query = "SELECT waktuTemu,catatan,penanganan.idPenanganan as idP
        FROM `pekerjaandokter`
        INNER JOIN users as tuser on tuser.idUser = idPasien
        INNER JOIN penanganan on penanganan.idPenanganan = pekerjaandokter.idPenanganan
        WHERE pekerjaandokter.sudahBertemu=1 AND tuser.username='$usrn' AND pekerjaandokter.idDokter='$idDokter'";
        $result= $conn->query($query);
        if ($result) {
            if (!mysqli_num_rows($result)) {
                echo "<tr><td colspan=2>
                  TIDAK ADA PASIEN YANG BERUSERNAME '$usrn'</td>
                    </tr>";
            }
            while ($row=$result->fetch_array()) {
                $idP = $row['idP'];
                echo "<tr>
                        <td>".$row['waktuTemu']."</td>
                        <td>". $row['catatan']."</td>
                        <td>
                        <a class ='linkstyle' href='dokter-history.php?edit=$idP'>EDIT</a></td>
                        <td>
                            <button> 
                                <a class ='linkstyle' href='dokter-history.php?deleted=$idP'>HAPUS</a> 
                            </button>
                        </td>
                    </tr>";
            }
        }
    ?>
</table>
<script>
function delete(idP) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "gethint.php?q=" + str, true);
    xmlhttp.send();
   
}
</script>