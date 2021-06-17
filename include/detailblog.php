<?php
    include('includes/fungsi.php');
       function limit_text($text, $limit)
    {
      if (str_word_count($text, 0)>$limit) {
        $words = str_word_count($text, 2);
        $pos  = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';

      }
      return $text;
    }
  ?>
  <body>
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">BLOG</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 blog-main">
          <?php
            if (isset($_GET["data"])) {
              $id_blog = $_GET['data'];
            }
            $sql_bl = "SELECT `b`.`judul`,DATE_FORMAT(`b`.`tanggal`, '%M %d, %Y'),`u`.`nama`, `b`.`isi`, `u`.`id_user` FROM `blog` `b` INNER JOIN `user` `u` ON `b`.`id_user`=`u`.`id_user` WHERE `b`.`id_blog` = '$id_blog'";
            $query_bl = mysqli_query($koneksi,$sql_bl);
            while ($data_bl = mysqli_fetch_row($query_bl)) {
              $judul_blog = $data_bl[0];
              $tanggal_blog = $data_bl[1];
              $nama_blog = $data_bl[2];
              $isi_blog = $data_bl[3];
              $id_user = $data_bl[4];
          ?>
            <div class="blog-post">
              <h2 class="blog-post-title"><a href="#"><?php echo $judul_blog; ?></a></h2>
              <p class="blog-post-meta"><?php echo $tanggal_blog; ?> by <a href="index.php?include=detail-penulis&penulis=<?php echo $id_user; ?>"><?php echo $nama_blog; ?></a></p>
              <!--<img src="slideshow/slide-1.jpg" class="img-fluid" alt="Responsive image"><br><br>-->
      
              <p><?php echo limit_text($isi_blog,150); ?></p>
              </div><!-- /.blog-post --><br><br>
            <?php } ?>
          </div><!-- /.blog-main -->
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
            </div>
      
            <div class="p-4">
              <h4 class="font-italic">Archives</h4>
              
            </div>
      
            
          </aside><!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
    </section><br><br>
  </body>
