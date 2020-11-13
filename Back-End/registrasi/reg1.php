<!DOCTYPE html>
<html lang="en">
 <?php
   $koneksi = mysqli_connect("localhost","root","","dom_bengkel") or die("Gagal Koneksi Database");
  	$query = "select * from lokasi";
    $data = mysqli_query($koneksi,$query) or die("Gagal query:".$query);			
                        ?>

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Otomotif Motorcycle</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <script language="javascript">
        function getkey(e)
        {
            if (window.event)
               return window.event.keyCode;
            else if (e)
               return e.which;
            else
               return null;
        }
    
        function goodchars(e, goods, field)
        {
        var key, keychar;
        key = getkey(e);
            if (key == null) return true;
     
            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();
     
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
                return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
            return true;
                
        if (key == 13) {
                var i;
                for (i = 0; i < field.form.elements.length; i++)
                        if (field == field.form.elements[i])
                                break;
                i = (i + 1) % field.form.elements.length;
                field.form.elements[i].focus();
                return false;
                };
        // else return false
        return false;
        }
    </script>

</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container col-6">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="aksii2.php">
                      <h2 class="form-title">Registrasi 2</h2>
                      <div class="form-group">
                            <input type="text" class="form-input" name="NamaPerusahaan" id="NamaPerusahaan" placeholder="Inisial perusahaan" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',this)" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="NamaBengkel" id="NamaBengkel" placeholder="Nama Bengkel" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789',this)" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="kontak" id="kontak" placeholder="kontak" required onKeyPress="return goodchars(event,'0123456789',this)"/>
                        </div>
                        <div class="form-group">
                       
					
					<select class="form-control" id="exampleFormControlSelect1" name="status_bengkel" required>
				  		<option selected>Status bengkel</option>
					  <option>Buka</option>
					  <option>Tutup</option>

					</select>
  </div>
                        <div class="form-group"> <span toggle="#Password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="jumlah_teknisi" id="jumlah_teknisi" placeholder="jumlah teknisi" required onKeyPress="return goodchars(event,'0123456789',this)"/>
                        </div>
                        
                        <div class="form-group">
                       
					
					<select class="form-control" id="exampleFormControlSelect1" name="NamaLokasi" required>
				  		<option value="">Pilih Lokasi</option>
                                <?php while($v=mysqli_fetch_array($data)):;?>
                                    <option value="<?php echo $v['NamaLokasi'];?>"><?php echo $v['NamaLokasi'];?></option>
                                <?php endwhile;?>	
					  

					</select>
                       
                       </div>
                        
                        
                        
                      
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Selanjutnya</button>
						</div>

   
		
</form>
                
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
    
    
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


</html>