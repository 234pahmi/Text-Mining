<?php
    require_once "proses/functions.php";
?>

<!doctype html>
<html lang="en" id="html">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
 
    
    <!-- CSS ku -->
    <link rel="stylesheet" href="css/style.css">
    <title>Avangers</title>
  </head>
  <body id="body">
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#home">Avangers</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active scroll" href="#case-folding">Case Folding<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link scroll" href="#tokenizing">Tokenizing</a>
                    <a class="nav-item nav-link scroll" href="#stopword">Stopword</a>
                    <a class="nav-item nav-link scroll" href="#stemming">Stemming</a>
                    <a class="nav-item nav-link scroll" href="#tfidf">TF-IDF</a>
                </div>
            </div>
        </div>
      </nav>
    <!-- Akhir Navbar -->
    
    


    <!-- Jumbotron -->
    <div class="jumbotron background jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><span>TEXT MINING</span>
            <h4 class=""><span>Muhammad Rizki Wahyudi - Muhammad Fadlillah - Pahmi Alifya Bahri</span></h4>
        </div>
    </div>
    <!-- AKhir Jumbotron -->





    <!-- Awal Case Folding -->
    <section id="case-folding" class="case-folding">
        <div class="container">
            <!-- Info Panel -->
            <div id="features">
                <div class="row justify-content-center">
                    <div class="col-md-6 info-panel">
                        <div class="row">
                            <div class="col-md text-center">
                                <a class="text-dark mb-3" data-toggle="collapse" href="#case-folding-isi" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none">CASE FOLDING</a>
                            </div>                    
                        </div>
                        <div class="collapse" id="case-folding-isi">
                            <p class="isi text-dark text-justify">Tidak semua dokumen teks konsisten dalam penggunaan huruf kapital. Oleh karena itu, peran Case Folding dibutuhkan dalam mengkonversi keseluruhan teks dalam dokumen menjadi suatu bentuk standar (biasanya huruf kecil atau lowercase). Sebagai contoh, user yang ingin mendapatkan informasi “KOMPUTER” dan mengetik “KOMPOTER”, “KomPUter”, atau “komputer”, tetap diberikan hasil retrieval yang sama yakni “komputer”. Case folding adalah mengubah semua huruf dalam dokumen menjadi huruf kecil. Hanya huruf ‘a’ sampai dengan ‘z’ yang diterima. Karakter selain huruf dihilangkan dan dianggap delimiter.</p>
                        </div>
                    </div>
                </div>
                    <!-- Akhir Info Panel -->

                    
                    <!-- content casefolding -->
                <div class="row mt-5 jumbotron">
                    <h1 class="ml-3 mb-3">Case Folding</h1>
                    <form  method="post" action="" name="input" class="ml-5">
                        <div class="row ml-2">
                            <div class="col-md-11">
                                <div class="form-row ml-2">
                                    <input type="text" class="form-control" id="casefolding" name="casefolding" placeholder="Masukan Kata" size="85" maxlength="1000">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary " type="submit" name="proses" >Proses</button>
                            </div>
                        </div>
                    </form> 
                </div>
                    <!-- akhir content casefolding -->                      
            </div>
            <!-- Hasil -->
            <?php              
            if (isset($_POST["proses"])) {
                if (empty($_POST['casefolding'])){
                    echo "";
                } else if(isset($_POST) > 0) {
                    echo "
                    <div class='row jumbotron mt-3'>
                        <div class='col-md-12'>
                            <h2> HASIL </h2>
                            <hr class='mb-2'>";
                            if (casefolding($_POST) > 0) {
                                echo '';
                            }
                        "</div>
                    </div>
                    ";
                    }
                } 
            ?>
            <!-- Akhir Hasil -->
        </div>
    </section>
    <!-- Akir Case Folding -->
    
        




    <!-- Awal Tokenisasi -->
    <section id="tokenizing" class="tokenizing mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 info-panel kotak">
                    <div class="row">
                        <div class="col-md text-center">
                            <a class="text-dark mb-3" data-toggle="collapse" href="#tokenizing-isi" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none">TOKENIZING</a>
                        </div>    
                    </div>
                    <div class="collapse" id="tokenizing-isi">
                        <p class="isi text-dark text-justify">Tahap Tokenizing adalah tahap pemotongan string input berdasarkan tiap kata yang menyusunnya. Tokenisasi secara garis besar memecah sekumpulan karakter dalam suatu teks ke dalam satuan kata, bagaimana membedakan karakter-karakter tertentu yang dapat diperlakukan sebagai pemisah kata atau bukan.Sebagai contoh karakter whitespace, seperti enter, tabulasi, spasi dianggap sebagai pemisah kata. Namun untuk karakter petik tunggal (‘), titik (.), semikolon (;), titk dua (:) atau lainnya, dapat memiliki peran yang cukup banyak sebagai pemisah kata.</p>
                    </div>
                </div>
            </div>
            

            <!-- content Tokenizing -->
            <div class="row mt-5">
                <div class="container">
                    <h1 class="ml-3 mb-3 text-white">Tokenizing</h1>
                    <form  method="post" action="" name="input" class="ml-5">
                        <div class="row ml-2">
                            <div class="col-md-10">
                                <div class="form-row ml-2">
                                    <input type="text" class="form-control" id="tokenizing" name="tokenizing" placeholder="Masukan Kata" size="85" maxlength="1000">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary " type="submit" name="proses" >Proses</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
         <!-- akhir content casefolding -->   
                    
            <!--Awal Hasil  -->
            <?php              
            if (isset($_POST["proses"])) {
                if (empty($_POST['tokenizing'])){
                    echo    "";
                } else if(isset($_POST) > 0) {
                    echo "
                    <div class='row mt-5 text-white ml-2'>
                        <div class='col-md-12'>
                            <h2> HASIL </h2>
                            <hr class='mb-2'>";
                            if (tokenizing($_POST) > 0) {
                                echo '';
                            }
                            
                        "</div>
                    </div>
                    ";
                    }
                } 
            ?>
            <!-- Akhir Hasil -->

        </div>
    </section>
    <!-- Akhir Tokenisasi -->






    <!-- Awal Stopword -->
    <section id="stopword" class="stopword">
        <div class="container">
            <!-- Info Panel -->
            <div id="features">
                <div class="row justify-content-center">
                    <div class="col-md-6 info-panel">
                        <div class="row">
                            <div class="col-md text-center">
                                <a class="text-dark mb-3" data-toggle="collapse" href="#stopword-isi" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none">STOPWORD</a>
                            </div>                    
                        </div>
                        <div class="collapse" id="stopword-isi">
                            <p class="isi text-dark text-justify">Tahap Stopword adalah tahap mengambil kata-kata penting dari hasil token. Bisa menggunakan algoritma stoplist (membuang kata kurang penting) atau wordlist (menyimpan kata penting). Stoplist/stopword adalah kata-kata yang tidak deskriptif yang dapat dibuang dalam pendekatan bag-of-words. Contoh stopwords adalah “yang”, “dan”, “di”, “dari” dan seterusnya.Namun terkadang stopping tidak selalu meningkatkan nilai retrieval. Pembangunan daftar stopword (disebut stoplist) yang kurang hati-hati dapat memperburuk kinerja sistem Information Retrieval (IR). Belum ada suatu kesimpulan pasti bahwa penggunaan stopping akan selalu meningkatkan nilai retrieval, karena pada beberapa penelitian, hasil yang didapatkan cenderung bervariasi.</p>
                        </div>
                    </div>
                </div>
                    <!-- Akhir Info Panel -->

                    <!-- content stopword -->
                <div class="row mt-5 jumbotron">
                    <h1 class="ml-3 mb-3">Stopword</h1>
                    <form  method="post" action="" name="input" class="ml-5">
                        <div class="row ml-2">
                            <div class="col-md-11">
                                <div class="form-row ml-2">
                                    <input type="text" class="form-control" id="stopword" name="stopword" placeholder="Masukan Kata" size="85" maxlength="1000">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary " type="submit" name="proses" >Proses</button>
                            </div>
                        </div>
                    </form> 
                </div>
                    <!-- akhir content stopword -->                      
            </div>
            <!-- Hasil -->
            <?php              

                if (isset($_POST["proses"])) {
                    if (empty($_POST['stopword'])){
                        echo "";
                    } else if(isset($_POST) > 0) {
                        echo "
                        <div class='row jumbotron mt-3'>
                            <div class='col-md-12'>
                                <h2> HASIL </h2>
                                <hr class='mb-2'>";
                                if (stopword($_POST) > 0) {
                                    echo '';
                                }
                                
                            "</div>
                        </div>
                        ";
                    }
                } 
            ?>
            <!-- Akhir Hasil -->
        </div>
    </section>
    
    <!-- Akhir Stopword -->
   





    <!-- Awal Stemming -->
    <section id="stemming" class="stemming mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 info-panel kotak">
                    <div class="row">
                        <div class="col-md text-center">
                            <a class="text-dark mb-3" data-toggle="collapse" href="#stemming-isi" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none">STEMMING</a>
                        </div>    
                    </div>
                    <div class="collapse" id="stemming-isi">
                        <p class="isi text-dark text-justify">Teknik Stemming diperlukan selain untuk memperkecil jumlah indeks yang berbeda dari suatu dokumen, juga untuk melakukan pengelompokan kata-kata lain yang memiliki kata dasar dan arti yang serupa namun memiliki bentuk atau form yang berbeda karena mendapatkan imbuhan yang berbeda.
                        Sebagai contoh kata bersama, kebersamaan, menyamai, akan distem ke root word-nya yaitu “sama”. Namun, seperti halnya stopping, kinerja stemming juga bervariasi dan sering tergantung pada domain bahasa yang digunakan.
                        Proses stemming pada teks berbahasa Indonesia berbeda dengan stemming pada teks berbahasa Inggris. Pada teks berbahasa Inggris, proses yang diperlukan hanya proses menghilangkan sufiks. Sedangkan pada teks berbahasa Indonesia semua kata imbuhan baik itu sufiks dan prefiks juga dihilangkan.</p>
                    </div>
                </div>
            </div>
            

            <!-- content stemming -->
            <div class="row mt-5">
                <div class="container">
                    <h1 class="ml-3 mb-3 text-white">Stemming</h1>
                    <form  method="post" action="" name="input" class="ml-5">
                        <div class="row ml-2">
                            <div class="col-md-10">
                                <div class="form-row ml-2">
                                    <input type="text" class="form-control" id="stemming" name="stemming" placeholder="Masukan Kata" size="85" maxlength="1000">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary " type="submit" name="proses" >Proses</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
         <!-- akhir content stemmming-->   
                    
            <!--Awal Hasil  -->
            <?php              
            if (isset($_POST["proses"])) {
                if (empty($_POST['stemming'])){
                    echo "";
                } else if(isset($_POST) > 0) {
                    echo "
                    <div class='row mt-5 text-white ml-2'>
                        <div class='col-md-12'>
                            <h2> HASIL </h2>
                            <hr class='mb-2'>";
                            if (stemming($_POST) > 0) {
                                echo '';
                            }
                            
                        "</div>
                    </div>
                    ";
                    }
                } 
            ?>
            <!-- Akhir Hasil -->

        </div>
    </section>
    <!-- Akhir stemming -->



   



    <!-- Awal TFIDF -->
    <section id="tfidf" class="tfidf">
        <div class="container">
            <!-- Info Panel -->
            <div id="features">
                <div class="row justify-content-center">
                    <div class="col-md-6 info-panel">
                        <div class="row">
                            <div class="col-md text-center">
                                <a class="text-dark mb-3" data-toggle="collapse" href="#tfidf-isi" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none">TF-IDF</a>
                            </div>                    
                        </div>
                        <div class="collapse" id="tfidf-isi">
                            <p class="isi text-dark text-justify">Algoritma TF-IDF (Term Frequency – Inverse Document Frequency) adalah salah satu algoritma yang dapat digunakan untuk menganalisa hubungan antara sebuah frase/kalimat dengan sekumpulan dokumen. Contoh yang dibahas kali ini adalah mengenai penentuan urutan peringkat data berdasarkan query yang digunakan.
                            Inti utama dari algoritma ini adalah melakukan perhitungan nilai TF dan nilai IDF dari sebuah setiap kata kunci terhadap masing-masing dokumen. Nilai TF dihitung dengan rumus TF = jumlah frekuensi kata terpilih / jumlah kata dan nilai IDF dihitung dengan rumus IDF = log(jumlah dokumen / jumlah frekuensi kata terpilih). Selanjutnya adalah melakukan perkalian antara nilai TF dan IDF untuk mendapatkan jawaban akhir.</p>
                        </div>
                    </div>
                </div>
                    <!-- Akhir Info Panel -->

                    <!-- content tfidf -->
                <div class="row mt-5 jumbotron">
                    <h1 class="ml-3 mb-3">TF-IDF</h1>
                    <form  method="post" action="" name="input" class="ml-5">
                    <!-- Dokumen pencarian -->
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-row">
                                    <label for="">Dokumen 1 :</label>
                                    <input type="text" name="dokumen[]" class="form-control" size="85" maxlength="1000" placeholder="Dokumen ke - 1" >
                                    <label for="">Dokumen 2 :</label>
                                    <input type="text" name="dokumen[]" class="form-control" size="85" maxlength="1000" placeholder="Dokumen ke - 1" >
                                    <label for="">Dokumen 3 :</label>
                                    <input type="text" name="dokumen[]" class="form-control" size="85" maxlength="1000" placeholder="Dokumen ke - 1" >
                                </div>
                            </div>
                        </div>

                        <!-- Query pencarian -->
                        <div class="row mt-5">
                            <div class="col-md-10">
                                <div class="form-row">
                                    <label for="tfidf">Query Pencarian</label>
                                    <input type="text" class="form-control" id="tfidf" name="tfidf" placeholder="Query Pencarian" size="85" maxlength="1000">
                                </div>
                            </div>
                            <div class="col-md-2 mt-4">
                                <button class="btn btn-primary btn-lg" type="submit" name="proses" >Proses</button>
                            </div>
                        </div>
                    </form> 
                </div>
                    <!-- akhir content tfidf -->                      
            </div>
            <!-- Hasil -->
            <?php              

                if (isset($_POST["proses"])) {
                    if (empty($_POST['tfidf'])){
                        echo "";
                    } else if(isset($_POST) > 0) {
                        echo "
                        <div class='row jumbotron mt-3'>
                            <div class='col-md-12'>
                                <h2> HASIL </h2>
                                <hr class='mb-2'>";
                                if (tfidf($_POST) > 0) {
                                    echo '';
                                }
                                
                            "</div>
                        </div>
                        ";
                    }
                } 
            ?>
            <!-- Akhir Hasil -->
        </div>
    </section>
    
    <!-- Akhir TFIDF -->




      

    <!-- Footer -->
    <div class="row footer">
        <div class="col text-center bg-dark pt-5 pb-5">
            <p>2019 All Right Reserved by Avangers</p>
        </div>
    </div>
    <!-- AKhir Footer -->

</div>
<!-- Akhir Container -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/JavaScript" src="js/script.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
  </body>
</html>