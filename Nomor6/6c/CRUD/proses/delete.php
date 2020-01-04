 <?php
    include ('koneksi.php');
    

    include("koneksi.php");

    $id = $_POST['delete_id'];

    $q = mysqli_query($con,"DELETE FROM tb_product WHERE idp='$id'");

    if ($q) {
        echo "<script>alert('Berhasil dihapus');document.location.href='../index.php'</script>";   
    }else {
        echo "<script>alert('Gagal dihapus');document.location.href='../index.php'</script>";   
    }

?>
