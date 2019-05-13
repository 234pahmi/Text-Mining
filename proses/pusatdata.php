<?php
include "Algoritma_stemming.php";
class pusatdata{

  //terdapat 2 proses dalam tahap tokenisasi :
  //1. memecahlan kalimat menjadi array
  //2. menghilangkan simbol-simbol yang terdapat pada kalimat
  //hasilnya kemudian disimpan dalam database.
  public function tokenisasi($dokumen){
    $kalimat = str_replace("!", "", "$dokumen");
    $kalimat = str_replace("?", "", "$kalimat");
    $kalimat = str_replace(".", "", "$kalimat");
    $kalimat = str_replace(",", "", "$kalimat");
    $kalimat = str_replace("=", "", "$kalimat");
    $kalimat = str_replace(";", "", "$kalimat");
    $kalimat = str_replace(":", "", "$kalimat");
    $kalimat = str_replace("'", "", "$kalimat");
    $kalimat = str_replace("  ", " ", "$kalimat");
    return $kalimat;
  }

  public function stopword($dokumen){
    $katapenghubung = array("di", "dan", "dari", "pada", "ke", "atau", "jika", "maka", "juga");
    $dokumen = preg_replace("/\b(". implode(")\b||\b", $katapenghubung).")\b/","", $dokumen);
    return $dokumen;
}

public function stemming($dokumen){
  $kalimat = explode(" ", $dokumen);
  foreach ($kalimat as $key => $value){
    $kalimat[$key] = nazief($value);
  }
  $dokumen = implode(" ", $kalimat);
  return $dokumen;
}

public function tampilarray($dokumen){
  foreach ($dokumen as $key => $value) {
    echo "Dokumen ke ".($key+1)." : ".$value."<br>";
  }
}

public function maptf($term, $dokumen){
  foreach ($dokumen as $key => $value) {
    $perkata = explode(" ",$value);
    $jumlah = 0;
    foreach ($perkata as $key_perkata => $value_perkata) {
      if(preg_match("/\b".$term."\b/i", $value_perkata)){
        $jumlah = $jumlah + 1;
      }
    }
    $tf[$key] = $jumlah;
  }
  return $tf;
}

public function hitung_df($maptf){
  foreach ($maptf as $mapkey => $mapvalue) {
    $jumlah = 0;
    foreach ($mapvalue as $key => $value) {
      if($maptf[$mapkey][$key] > 0){
        $jumlah = $jumlah + 1;
      }
    }
    $df[$mapkey] = $jumlah;
  }
  return $df;
}

public function hitung_idf($D,$df){
  foreach ($df as $key => $value) {
    $idf[$key] = log($D/$value);
  }
  return $idf;
}

public function mapW($maptf,$idf){
  for($i = 0;$i<count($idf);$i++){
    for ($baris=0;$baris<count($maptf);$baris++){
      for ($kolom=0;$kolom<count($maptf[$baris]);$kolom++){
        $mapW[$baris][$kolom] = ($idf[$baris]+1)*$maptf[$baris][$kolom];
      }
    }
  }
  return $mapW;
}

public function hitungBobot($mapW){
  for ($baris=0; $baris < count($mapW); $baris++) {
    for ($kolom=0; $kolom < count($mapW[$baris]); $kolom++) {
      @$bobot[$kolom] += $mapW[$baris][$kolom];
    }
  }
  return $bobot;
}

}

?>