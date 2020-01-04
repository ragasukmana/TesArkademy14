<!DOCTYPE html>
<html>
<head>
<title> ARKADEMY BATCH 14 </title>
  <!--CSS-->
  <link rel="stylesheet" href="view/tampil.css" type="text/css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery-3.4.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  
<!---jsDELETE--->
  <script>
  $(document).ready(function (){
   $('.deletebtn').on('click',function(){

      $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
           }).get();

            console.log(data);
            
            $('#delete_id').val(data[0]); 
        
   });
  });

  </script>

<!---EDITjs---->
  <script>
  $(document).ready(function (){
   $('.editbtn').on('click',function(){

      $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            
            $('#update_id').val(data[0]);
            $('#kasir').val(data[1]);
            $('#menu').val(data[2]);
            $('#kategori').val(data[3]);
            $('#harga').val(data[4]);
        
   });
  });
  </script>
</head>
<body>
<div class="container">
<header>
  <div class="row">
      <img alt="logo" id="logo" src="img/arkademylogo.png" height="60" width="120">
    </div>
    <div class="col-8" id="judul">
      <p1> ARKADEMY <a id="text2"> COFFE SHOP </p1> </a>
    </div>
    <div class="col-12">
      <button id="boladd" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
        ADD
      </button>
    </div>
</div>    
</header>
  <table class="table col-9">
  <thead id=headt>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Cashier</th>
      <th scope="col">Product</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
		<tbody>
			<?php
        $no=1;
				include('proses/koneksi.php');
				$query=mysqli_query($con,"SELECT *,tb_product.idp as idpr, tb_cashier.id as idcash, tb_category.id as idcat 
                            FROM tb_product,tb_cashier,tb_category WHERE tb_product.id_cashier = tb_cashier.id AND tb_product.id_category = tb_category.id
                            ORDER BY idpr ASC");
				while ($x=mysqli_fetch_assoc($query)){
            echo "<tr>
                    <td>$no></td>
                    <td>$x[nama_kasir]</td>
                    <td>$x[nama_produk]</td>
                    <td>$x[nama_kategori]</td>
                    <td>$x[price]</td>
                    <td>
                      <button type='button' class='btn btn-success btn-sm editbtn'> EDIT </button>
                      <button type='button' class='btn btn-danger btn-sm deletebtn' > DELETE  </button>
                    </td></tr>"; $no++;
              } 
          ?>
		</tbody>
		</table>
</div>
</div>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="proses/tambahdata.php">
        <div class="form-group">
          <select class="form-control" id="inputkasir" name="kasir" required>
            <option selected disabled>Kasir...</option>
            <option value="1">Pevita Pearce</option>
            <option value="2">Raisa Ardhiana</option>
            <option value="3">Raga Sukmana</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" id="inputmenu" name="menu" required>
            <option selected disabled>Menu...</option>
            <option>Latte</option>
            <option>Cake</option>
            <option>Pizza</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" id="inputkategori" name="kategori" required>
            <option selected disabled>Food..</option>
            <option value="1">Food</option>
            <option value="2">Drink</option>
          </select>
        </div>     
        <div class="form-group">
          <input type="text" class="form-control" id="inputharga" placeholder="harga..." name="harga">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      
      </div>
    </div>
  </div>
</form>
</div>

<!-- Modal EDIT -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="proses/edit.php">
      <div class="modal-body">

        <input type="hidden" name="update_id" id="update_id">

        <div class="form-group">
          <select class="form-control" id="kasir" name="kasir" required>
            <option selected disabled>Kasir...</option>
            <option value="1">Pevita Pearce</option>
            <option value="2">Raisa Ardhiana</option>
            <option value="3">Raga Sukmana</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" id="menu" name="menu" required>
            <option selected disabled>Menu...</option>
            <option>Latte</option>
            <option>Cake</option>
            <option>Pizza</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" id="kategori" name="kategori" required>
            <option selected disabled>Food..</option>
            <option value="1">Food</option>
            <option value="2">Drink</option>
          </select>
        </div>     
        <div class="form-group">
          <input type="text" class="form-control" id="harga" placeholder="harga..." name="harga">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="updatedata">Update</button>
      </div>
    </div>
  </div>
</form>
</div>

<!-- Modal DELETE -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalEdit1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="proses/delete.php">
      <div class="modal-body">

        <input type="hidden" name="delete_id" id="delete_id">
        <h4> Are you sure to delete this ?? </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> No </button>
        <button type="submit" class="btn btn-primary" name="deldata"> I'm Sure </button>
      </div>
    </div>
  </div>
</form>
</div>
