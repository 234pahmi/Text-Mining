<?php

$conn = mysqli_connect("localhost","root","","text-mining");


function casefolding($data){
    
    if(isset($_POST["proses"])){

    $text = $data["casefolding"];
    $text1 = strtolower($data["casefolding"]);
    $text2 = strtoupper($data["casefolding"]);
    $text3 = ucfirst($data["casefolding"]);
    $text4 = ucwords($data["casefolding"]);
    $count = count(explode(" ", $text));
        if($text != null){
            echo "<b>Kalimat : </b> $text </br>";
            echo "<b>Kalimat (strtolower) :</b> $text1 </br>";
            echo "<b>Kalimat (strtoupper) :</b> $text2 </br>";
            echo "<b>Kalimat (ucfirst) :</b> $text3 </br>";
            echo "<b>Kalimat (ucwords) :</b> $text4 </br>";
            echo "Berisi $count kata";
        }
    
    }

    return ($data);
}
   





function tokenizing($data){

             
    if(isset($_POST['proses'])){
        $kalimat = $data['tokenizing'];
        echo "kalimat awal : <br>"."$kalimat";
        echo"<br>";
        $hasil = explode(" ", $kalimat);
        
        echo "<br> Di pecah Menjadi : <br>";
        for($i=0; $i<count($hasil); $i++){
            echo "Kata Ke $i adalah : ".$hasil[$i]."<br>";
        }
    }

    return ($data);

}







function stopword($data){

    global $conn;

    if (isset($_POST['proses'])){

        $kalimat = $data['stopword'];
        echo "$kalimat";
        echo "<br>";
        echo "<br>";
        echo "<br>";
    
        $hasil1 = strlen($kalimat);
        $count = count(explode(" ",$kalimat));
        $hasil2 = explode(" ",$kalimat);
    
        echo "Jumlah karakter : ".$hasil1;
        echo "<br>";
        echo "Jumlah kata : ".$count;
        echo "<br>";
    
        for ($i=0; $i<count($hasil2); $i++){
            echo ("Kata ke $i adalah : ".$hasil2[$i]."<br>");
        }
        echo "<br>";
        echo "Sebelum di ubah : ";
      
        $str = str_replace(',' , ' ',$kalimat);
        $str = str_replace('.' , ' ',$str);
        $str = str_replace('?' , ' ',$str);
        $str = str_replace('!' , ' ',$str);
        $str = str_replace('/' , ' ',$str);
        $str = str_replace('$' , ' ',$str);
    
        $string = strtolower($str);
    
        echo "<br>";
        
        $stopwords = mysqli_query($conn,"SELECT kata_verba FROM tb_verba");
    
        foreach ($stopwords as $data){
            $stopword[]=$data['kata_verba'];
        }
    
        foreach ($stopword as &$word) {
                $word = '/\b' . preg_quote($word, '/') . '\b/';
            
        }

        $replace = preg_replace($stopword,'',$string);
        
        echo "$string";
        echo"<br>";
        echo"<br>";
        echo"Sesudah di ubah :";
        echo"<br>";
        echo"$replace";
    }

}










function stemming($data){

    global $conn;

    require "Algoritma_stemming.php";
    error_reporting(0);

    if (isset($_POST['proses'])) {
        $teks_asli = $data['stemming'];
        echo $teks_asli;
    
        $lenght = strlen($teks_asli);
        
        $pattern = "[A-Za-z]";
        $kata = '';
    
        echo "<h3 class='mt-3'>Kata Dasarnya :</h3>";
        //  if (preg_match($pattern,$teks_asli)) {
            
            $stemming = NAZIEF($teks_asli); //Memasukan kata ke fungsi
            echo "$stemming";
               
    }
    
}






function tfidf($data){
    global $conn;
    require_once 'pusatdata.php';
    $pusatdata = new pusatdata;
    if(isset($_POST['proses'])){
        $dokumen = $_POST['dokumen'];
        $pencarian = $_POST['tfidf'];

        echo "Dokumen Asli : <br>";
        $pusatdata->tampilarray($dokumen);
        echo "Query Pencarian : ".$pencarian;

        echo "<br/>";
        echo "<br/>";
        echo "Hasil Tokenisasi : <br>";
        foreach ($dokumen as $key => $value) {
          $dokumen[$key] = $pusatdata->tokenisasi($value);
        }
        $pusatdata->tampilarray($dokumen);
        $pencarian = $pusatdata->tokenisasi($pencarian);
        echo "Query Pencarian : ".$pencarian; 

        echo "<br/>";
        echo "<br/>";
        echo "Hasil Stopword : <br>";
        foreach ($dokumen as $key => $value) {
          $dokumen[$key] = $pusatdata->stemming($value);
        }
        $pusatdata->tampilarray($dokumen);
        $pencarian = $pusatdata->stemming($pencarian);
        echo "Query Pencarian : ".$pencarian;

        echo "<br/>";
        echo "<br/>";
        echo "Hasil Stemming : <br>";
        $pusatdata->tampilarray($dokumen);
        echo "Query Pencarian : ".$pencarian;

        // Menghitung Dokumen Frequency
        $pencarian = $pusatdata->tokenisasi($pencarian);
        $term = explode(" ",$pencarian);
        foreach ($term as $key => $value) {
          $maptf[$key] = $pusatdata->maptf($value, $dokumen);
        }
        
        // echo "<pre>".print_r($maptf, true)."</pre>";
        $df = $pusatdata->hitung_df($maptf);
        $idf = $pusatdata->hitung_idf(count($dokumen), $df);
        $mapW = $pusatdata->mapW($maptf, $idf);
        $bobot = $pusatdata->hitungBobot($mapW);

        echo "<pre>".print_r($bobot, true)."</pre>";
      }
}


?>

