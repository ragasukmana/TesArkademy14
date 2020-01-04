<?php 
    include('koneksi.php');
    
    $kasir=$_POST['kasir'];
    $menu=$_POST['menu'];
    $kategori=$_POST['kategori'];
    $harga=$_POST['harga'];
    
    $query = mysqli_query($con,"INSERT INTO tb_product(nama_produk,price,id_category,id_cashier) 
                          VALUES ('$menu','$harga','$kategori','$kasir')");

    if ($query) {
        echo "<script>alert('Berhasil Menambahkan Data Ke Database');document.location.href='../index.php'</script>";   
    }else {
        echo "<script>alert('Gagal Menambahkan Data Ke Database');document.location.href='../index.php'</script>";   
    }
 
?>
