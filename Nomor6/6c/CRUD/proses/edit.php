<?php
    
    include('koneksi.php');
    
    $id = $_POST['update_id'];
    $kasir=$_POST['kasir'];
    $menu=$_POST['menu'];
    $kategori=$_POST['kategori'];
    $harga=$_POST['harga'];

    $query = mysqli_query($con,"UPDATE tb_product SET nama_produk='$menu', price='$harga', id_category='$kategori', id_cashier='$kasir' WHERE idp='$id'");
    
    if ($query) {
        echo "<script>alert('Berhasil di Update');document.location.href='../index.php'</script>";   
    }else {
        echo "<script>alert('Gagal di Update');document.location.href='../index.php'</script>";   
    }


?>
