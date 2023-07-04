<?php 
require 'function.php';
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<script src="fontawesome/all.js"></script>
    <link href="css/styles4.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		text-decoration: none;

	}
	body{
		margin: 0;
		font-family: 'Times New Roman' , Times, serif;
		font-size: 1rem;
		background-image: url('img/background.jpeg');
		background-size: cover	;
		background-position: 50% 80%;
		background-attachment: fixed;
		background-repeat: no-repeat;
	}
	.main{
		display: flex;
		flex-wrap: nowrap;
		height: webkit-fill-availeble;
		max-width: 100vh;
		overflow-y: auto;
		overflow-y: hidden;
	}
	*{
		margin: 0;
		padding: 0;
		list-style: none;
		text-decoration: none;
	}
	.sidebar{
		position: fixed;
		left: 0px;
		width: 250px;
		height: 100%;
		background: rgba(67, 60, 63, 0.5);
		transition: all 0.5s ease;
	}
	.sidebar .top{
		font-size: 22px;
		color: #fff;
		text-align: center;
		line-height: 70px;
		padding-right: 50px;
		background-image: linear-gradient(to right, #003366, #0a4f94);
	}
	.sidebar ul {
		display: block;
		color: #fff;
		box-sizing: border-box;
		transition: all 0.5s ease;
	}
	.sidebar ul:after{
		content: " ";
		clear: both;
		display: block;
	}
	.sidebar ul li  {
		position: relative;
		display: block;
		padding:5 px 10px;
		color: #757575;
		text-decoration: none;
	}
	.sidebar ul li:hover{
		background: #efe7bc;
	}

	.sidebar ul li:hover .dropdown{
		display: block;
	}
	.sidebar ul li a{
		display: block;
		height: 100%;
		width: 100%;
		line-height: 65px;
		font-size: 20px;
		color: #fff;
		padding-left: 33px;
		box-sizing: border-box;
		border-top: 1px solid rgba(6, 255, 251, 0.1);
		border-bottom: 1px solid rgba(125, 134, 146, 0.302);
		transition: all 0.5s ease;
	}

	.sidebar ul li a:hover{
		padding-left: 100px;
		background: #efe7bc;
		color: rgb(0, 0, 0);
	}
	

	.sidebar ul .dropdown{
		display: inline-block;
		padding-left: 6px;
		background: silver;
		left: 100%;
		height: 200px;
		width: 250px;
		z-index: 1;

	}	
	.dropbtn {
		background-color: transparent;
		color: white;
		padding: 20px;
		padding-left: 33px;
		width: 250px;
		padding-right: 100px;
		font-size: 16px;
		border: none;
		cursor: pointer;
		text
	}

.dropbtn:hover, .dropbtn:focus {
  background-color: #efe7bc;
  color:black;
}


.dropdown-content {
  display: none;
  background-color: #0a4f94;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: #fff;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #74bdcb;}

.show {display: block;}

button{
	width: 200px;
}

.kotak{
  margin-left: 250px;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}

</style>
<body>
	<main>
		<div class="sidebar">
			<div class="top">
				Kelompok 10
			</div>
			<ul>
				<li><a class="#" href="index.php"><i class="fa fa-fw fa-home"></i> Dashboard</a></li>
				<button onclick="myFunction()" class="dropbtn"><i class="fa fa-fw fa-database"></i> Data Master</button>
				<div id="myDropdown" class="dropdown-content">
					<a href="datadosen.php"><i class="fa fa-fw fa-user"></i>Data Dosen</a>
					<a href="datamahasiswa.php"><i class="fa fa-fw fa-user"></i>Data Mahasiswa</a>
					<a href="#"><i class="fa fa-fw fa-user"></i>Data Mata Kuliah</a>
					<a href="#"><i class="fa fa-fw fa-user"></i>Data Lainnya</a>
				</div>

				<li><a class="#" href="#"><i class="fa fa-fw fa-clipboard"></i> Penjadwalan</a></li>
				<li><a class="#" href="#"><i class="fa fa-fw fa-lock"></i> Ganti password</a></li>
				<li><a class="#" href="#"><i class="fa fa-fw fa-sign-out"></i> Log out</a></li>
			</ul>			
		</div>
        <div class="container">
            <div class="kotak">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Data Mahasiswa</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                        $ambilsemuadata = mysqli_query($koneksikan,"SELECT * FROM datamahasiswa");
                                        while($data=mysqli_fetch_array($ambilsemuadata)){
                                        $i = $data['idmahasiswa'];
                                        $namamahasiswa = $data['namamahasiswa'];
                                        $nim = $data['nim'];
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$namamahasiswa;?></td>
                                        <td><?=$nim;?></td>
                                    </tr>
                                    <?php 
                                            };
                                    ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Mahasiswa</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div> 
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
          <p><input type="text" name="namamahasiswa" placeholder="Nama Mahasiswa" class="form-control" required></p>
          <p><input type="text" name="nim" placeholder="NIM Mahasiswa" class="form-control" required></p>
          <button type="submit" class="btn btn-primary" name="tambahdatamahasiswa">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
	</main>

	<script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
		  document.getElementById("myDropdown").classList.toggle("show");
		}
		
		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
			  var openDropdown = dropdowns[i];
			  if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			  }
			}
		  }
		}
		</script>

</body>
</html>