<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pasok Buku</title>
</head>
<body>
<div class="container-fluid" id= "content" >
    <div class="card">
	    <div class="card-header">
		    Form Pasok Buku
	    </div>
	    <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <fieldset class="form-group">
                    <select class="form-select" id="basicSelect" name="iddistributor">
                    <?php
                        $no = 0;
                        $sql = "SELECT * FROM tbl_distributor";
                        $jalan = mysqli_query($con, $sql);
                        while($r = mysqli_fetch_assoc($jalan)){
                            $no++
                    ?>
                        <option value="<?php echo $r['id_distributor'] ?>"><?php echo $r['nama_distributor']?></option>
                    <?php } ?>
                    <?php if ($no == ""){
                        echo "<tr><td colspan='7'>No Record</td></tr>";
                    }?>
                    </select>
                </fieldset>              
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" name=cari value=cari>  
                </div>
            </form>
	    </div>
    </div>
</body>
</html>