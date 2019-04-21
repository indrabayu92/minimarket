<html>
    <head>
        <title>Mini Market</title>  
        <link rel="stylesheet" type="text/css" href="minimarket.css">
        <script type="text/javascript" src="jquery.js"></script>
    </head>
    <body>
        <header>
            <center><h1>MINI MARKET</h1></center>    
        </header>
        <main>
            <div class="wrapper">
                <form method="POST" id="frm">
                    <input type="number" name="no_barang" id="no_barang" placeholder="Nomor Barang" />
                    <input type="text" name="nama_barang" id="nama_barang" placeholder="Nama Barang"/>
                    <input type="text" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang"/>
                    <input type="number" name="stock_barang" id="stock_barang" placeholder="Jumlah stock Barang"/>
                    <input type="number" name="harga_barang" id="harga_barang" placeholder="Harga Barang"/><br><br>
                    <input type="submit" name="insert" value="Simpan" id="submit">
                    <input type="reset" name="clear" value="Clear"/>
                </form>
                <center><a href="data.php"><button id="">Tampilkan Data</button></a></center>
            </div><br>
            <div class="right">
                <img src="kisspng-superette-logo-mini-market-5b238a9eee7b93.5761073515290559029768.png"  width="480" height="400">
            </div>
        </main> 
        <center><footer>
            <h4>Copyrights</h4>
            <h5>Kadek Indra Bayu Mahottama 1705552004</h5>
        </center></footer>
        <script type="text/javascript">
            $('#submit').on('click',function( event ){
                event.preventDefault();
                var no_barang = $('#no_barang').val();
                var nama_barang = $('#nama_barang').val();
                var jenis_barang = $('#jenis_barang').val();
                var stock_barang = $('#stock_barang').val();
                var harga_barang = $('#harga_barang').val();
                    $.ajax({
                        method: "POST",
                        url: "insert.php",
                        data: { no_barang : no_barang, nama_barang : nama_barang, jenis_barang : jenis_barang, stock_barang : stock_barang, harga_barang : harga_barang,type:"input"},
                        success : function(){
                            alert("Sukses");
                        }
                    });
                });
        </script>
    </body>
</html>

