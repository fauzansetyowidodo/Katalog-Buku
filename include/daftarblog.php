<?php
    include('includes/fungsi.php');
  ?>
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">BLOG</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
            <?php
                if (isset($_GET['include'])) {
                    $include = $_GET['include'];
                    if (isset($_GET['data'])) {
                        $data = $_GET['data'];
                        if ($include=='daftar-blog-kategori') {
                            $sql = "SELECT kategori_blog FROM kategori_blog WHERE id_kategori_blog = $data";
                            
                        }else {
                          $ex = explode("-",$data);
                          $bulan = $ex[0];
                          $tahun = $ex[1];
                          $sql = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` WHERE MONTH(`tanggal`) = $bulan AND YEAR(`tanggal`) = $tahun";
                        }
                        $query = mysqli_query($koneksi,$sql);
                        while ($data_c = mysqli_fetch_row($query)) {
                            $nama = $data_c[0];
                        }
                    } 
                }
            ?>
            
            <h2 class="text-primary">
            <?php if($include=='daftar-blog-arsip'){ echo "Archives : ", BulanIndo($nama);}else{ echo "Categories ";} ?>
            </h2><br><br>
            <div class="row">
                <div class="col-md-9 katalog-main">
                    
                        <?php 
                          $include = $_GET['include'];
                          $data = $_GET['data'];
                          if($include=='daftar-blog-kategori'){
                              include('kategori_blog.php');
                          }else{
                              include('arsip.php');
                          }
                        ?>
                    <!-- .row-->
                </div><!-- /.katalog-main -->
                <aside class="col-md-3 blog-sidebar">
            
            <div class="p-4">
              <h4 class="font-italic">Categories</h4>
              <ol class="list-unstyled mb-0">
              <?php
                $sql_k = "SELECT `id_kategori_blog`,`kategori_blog`
                          FROM `kategori_blog`
                          ORDER BY `kategori_blog`";
                $query_k = mysqli_query($koneksi,$sql_k);
                while($data_k = mysqli_fetch_row($query_k)){
                $id_kat = $data_k[0];
                $nama_kat = $data_k[1];
                ?>
                <li><a href="index.php?include=daftar-blog-kategori&data=<?php echo $id_kat;?>">
                <?php echo $nama_kat;?></a></li>
                <?php }?>
               </ol> 
            </div>
            <div class="p-4">
              <h4 class="font-italic">Archives</h4>
              <ol class="list-unstyled mb-0">
                <?php
                  include('include/fungsi.php');
                  $sql = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` GROUP BY `tgl`";
                  $query = mysqli_query($koneksi,$sql);
                  while($data =  mysqli_fetch_row($query)){
                    $tanggal = $data[0];
                ?>
                <li><a href="index.php?include=daftar-blog-arsip&data=<?php echo $tanggal; ?>"><?php echo BulanIndo($tanggal); ?></a></li>
                <?php } ?>
              </ol>
            </div>
      
            
          </aside><!-- /.blog-sidebar -->
      </main><!-- /.container -->
    </section><br><br>