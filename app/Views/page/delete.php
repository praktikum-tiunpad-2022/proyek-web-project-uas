<?php
include 'index.php';
if(isset($_GET['del_id'])){
    $delete = mysqli_query($koneksi, "DELETE from data where id_data = '".$_GET['del_id']."'");
    echo '<script>window.location="streaming"</script>';
}
?>