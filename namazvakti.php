<?php
 
function ay($ay){


    switch ($ay) {
      case '1':  return "Ocak";
        break;
      case '2':  return "Şubat";
        break;
      case '3':  return "Mart";
        break;
      case '4':  return "Nisan";
        break;
      case '5':  return "Mayıs";
        break;
      case '6':  return "Haziran";
        break;
      case '7':  return "Temmuz";
        break;
      case '8':  return "Ağustos";
        break;
      case '9':  return "Eylül";
        break;
      case '10':  return "Ekim";
        break;
      case '11':  return "Kasım";
        break;
      case '12':  return "Aralık";
        break;
      
      default:
          return "Ocak";
        break;
    }



}



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "www.namazvakti.com/XML.php?cityID=25554",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: apikey your_token",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;


}
 
 //echo $response;

 function getir($baslangic, $son, $cekilmek_istenen)
{
@preg_match_all('/' . preg_quote($baslangic, '/') .
'(.*?)'. preg_quote($son, '/').'/i', $cekilmek_istenen, $m);
return @$m[1];
}
?>

  <table id="table-no-resize" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tarih</th>
                    <th>İmsak</th>
                    <th>Güneş</th>
                    <th>Öğlen</th>
                    <th>İkindi</th>
                    <th>Akşam</th>
                    <th>Yatsı</th>
                </tr>
            </thead>
            <tbody>


<?php
$cek = getir('<prayertimes','</prayertimes>',$response);
 
    foreach ($cek as $vakitler) {

            $bilgi = explode (">",$vakitler);  //Değerler Alındı
           // echo  "Değerler : ".$bilgi[0];

                        $deger=explode (' ',$bilgi[0]);
 
                        $gun=getir('day="','"',$deger[2]);
                        $ay=getir('month="','"',$deger[3]);
                  

                        $saat = explode (chr(9),$bilgi[1]);
 ?>
                            




                <tr>
                     <td><?=$gun[0]." ".ay($ay[0]) ?></td>
                    <td><?=$saat[0] ?></td>
                    <td><?=$saat[3] ?></td>
                    <td><?=$saat[5] ?></td>
                    <td><?=$saat[6] ?></td>
                    <td><?=$saat[9] ?></td>
                    <td><?=$saat[10] ?></td>
                </tr>

          
                     
   <?php }
?>

  </tbody>
  </table>
 