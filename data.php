<html>
  <head>
    <script type="text/javascript" src="jquery.js"></script>
	  <style type="text/css">
      h1{
        font-family: sans-serif;
      }
 
      table {
        font-family: Arial, Helvetica, sans-serif;
        color: #666;
        text-shadow: 1px 1px 0px #fff;
        background: #eaebec;
        border: #ccc 1px solid;
      }
 
      table th {
        padding: 15px 35px;
        border-left:1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        background: #ededed;
      }
 
      table th:first-child{  
        border-left:none;  
      }
 
      table tr {
        text-align: center;
        padding-left: 20px;
      }
 
      table td:first-child {
        text-align: center;
        padding-left: 20px;
        border-left: 0;
      }
 
      table td {
        padding: 15px 35px;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
      }
 
      table tr:last-child td {
        border-bottom: 0;
      }
 
      table tr:last-child td:first-child {
        -moz-border-radius-bottomleft: 3px;
        -webkit-border-bottom-left-radius: 3px;
        border-bottom-left-radius: 3px;
      }
 
      table tr:last-child td:last-child {
        -moz-border-radius-bottomright: 3px;
        -webkit-border-bottom-right-radius: 3px;
        border-bottom-right-radius: 3px;
      }
 
      table tr:hover td {
        background: #f2f2f2;
        background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
        background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
      }
    </style>
  </head>
<body>
  <?php
    $db_host = 'localhost'; // Nama host
    $db_user = 'root'; // User 
    $db_pass = ''; // Password 
    $db_name = 'db_minimarket'; // Nama Database
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
	    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
    }
    $sql = 'SELECT no_barang, nama_barang, jenis_barang, stock_barang, harga_barang FROM tb_barang';
    $query = mysqli_query($conn, $sql);
    if (!$query) {
	    die ('SQL Error: ' . mysqli_error($conn));
    }
// tabel
    echo '<center><table border="1">
		  <thead>
			  <tr>
			    <th>No Barang</th>
			    <th>Nama Barang</th>
			    <th>Jenis Barang</th>
          <th>Stock Barang</th>
          <th>Harga Barang</th>
          <th>Option</th>
			  </tr>
		  </thead>
    <tbody>';
    while ($row = mysqli_fetch_array($query)){
      $str = $row['no_barang'];
	    echo '<tr id="form">
			        <td>'.$row['no_barang'].'</td>
              <td>'.$row['nama_barang'].'</td>
              <td>'.$row['jenis_barang'].'</td>
              <td>'.$row['stock_barang'].'</td>
              <td>'.$row['harga_barang'].'</td>
              <td>
                <a href="edit.php?no_barang=$row[no_barang]" id="edit" class="Edit">Edit</a>
                <a id="hapus" class="Hapus" href=""?no_barang=<?php echo $data["no_barang"]; ?>Hapus</a>
              </td>
		        </tr>';
    }
    echo'
	  </tbody></table></center>';
  ?>
  <script type="text/javascript">
    $('#hapus').on('click',function( event ){
      event.preventDefault();
      $.ajax({
        method: "POST",
        url: "delete.php",
        success : function(){
          $('#form').fadeOut();
        }
      });
  });
  </script>
</body>
</html>