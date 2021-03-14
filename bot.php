system("rm -f .time");
# Color
$red = "\e[1;31m";
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
$ttk = "{$bcyan}[{$byellow}•{$bcyan}]";
//__________

$js = json_decode(file_get_contents("https://raw.githubusercontent.com/irkop1/pirates/master/sett.json"),1);


$sc = $js["status"];
$msg1 = $js["msg1"];
$versi = $js["versi"];
$msg2 = $js["msg2"];
$info = $js["info"];


function banner(){
    global $byellow,$info,$ttk,$white,$red,$cyan,$white,$green,$yellow;
date_default_timezone_set("Asia/Jakarta");
system("clear");
echo "
   \e[1;32;40m╔╔═\e[1;39m╦══\e[1;35m══╦\e[1;36m══╦\e[1;30m═════\e[1;33m╦\e[1;37m════\e[1;35m═╦\e[1;34m═╗═╗ 
   \e[1;31;40m║║\e[1;36;41m                       \e[1;38;40m║ ║  
   \e[1;30;40m║║\e[1;39;41m      MESIN TERMUX     \e[1;35;40m║ ║  
   \e[1;33;40m║║\e[1;39;41m        WONG JOWO      \e[1;34;40m║ ║
   \e[1;34;40m║║\e[1;33;47m                       \e[1;33;40m║ ║ 
   \e[1;35;40m║║\e[1;31;47m                       \e[1;32;40m║ ║
   \e[1;36;40m║║\e[0;31;47m                       \e[1;33;40m║ ║
   \e[0;33m║╚══╝─╚══════════════╝─╚═╝ ║
   \e[1;37m╚╩═══\e[0;31;43m".date('H:i:s')."\e[1;34;40m\e[1;34;47m".date('d/m/Y')."\e[1;36;40m══╩═╝
   \e[1;30m[••]\e[1;32mBOT \e[1;33mPIRATESCASH \e[1;36mMULTI\e[1;30m\e[1;30m[••]
        \e[1;30m[••]\e[1;32m\e[1;33mVersi\e[1;36m 3\e[1;30m[••]

{$ttk}$white Fix log-in
{$ttk}$red Bila ada yang error bisa lapor dan sertakan Screenshot.$byellow
Donate :$cyan
[Doge]$white D7DG1BrTDWz79Vswu5dWEhHkaQ9KBuJ6C8
$green$info
$ttk{$yellow}==================================={$ttk}
$white";
}


if($sc !="online"){banner(); echo $bred.$msg1."\n";exit;}
if($versi != 3){ banner();echo $red.$msg2."\n";exit;}


ver();
 

if(!file_exists('config.php')){
  banner();
  echo "[$yellow"."User-agent: ]".$white."=> ";
  $useragent = trim(fgets(STDIN));
  echo "[$yellow"."Cookie: ]".$white."=> ";
 $akuns = trim(fgets(STDIN));
 if($akuns ==null or $useragent==null){echo "$bred   insert Error \n";exit;}
 $config = fopen("config.php", "w");
 fwrite($config, '<?php');
 fwrite($config, "\n\n");
 fwrite($config, '$'.'useragent = "'.$useragent.'";'." \n\n". '');
 fwrite($config, '
 //Jangan di edit" biar tidak error

 ');
 fwrite($config, "$"."akuns = array(); \n ");
 fwrite($config, '$'.'akuns [] = "'.$akuns.'";
 ');
}


include("config.php");
$i=0;$c=count($akuns);
while($i < $c){
include("config.php");
$url = "https://piratecash.io/dashboard.php";
$get = no_d($url,$akuns[$i]);
$use = stm('fa-user-circle-o"></i> ','</span>');
if(strpos($get,$use) == false):
echo "\n Akun No [$i] \t Cookie Error, Silahkan Ambil Cookie lagi \n ";exit;
endif;
$i++;
}


function data($url,$data,$akun){
global $useragent,$yellow;
$ua = array(
"Host: piratecash.io",
"origin: https://piratecash.io",
"x-requested-with: XMLHttpRequest",
"user-agent: ".$useragent."",
"cookie: ".$akun.""
);
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$ua);
    curl_setopt ($ch, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt ($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    $gas = curl_exec($ch);
    $kode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    return $gas;
}
function no_d($url,$akun){
global $useragent,$yellow;
$ua = array(
"Host: piratecash.io",
"origin: https://piratecash.io",
"x-requested-with: XMLHttpRequest",
"user-agent: ".$useragent."",
"cookie: ".$akun.""
);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$ua);
    curl_setopt ($ch, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt ($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    $gas = curl_exec($ch);
    $kode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    return $gas;
    }
function stm($awal,$akhir){
    global $get;
    $a = explode($awal,$get);
    $a = explode($akhir,$a[1])[0];
    return $a;
}
function claim(){
    global $time,$akun;
$get = no_d("https://piratecash.io/refill.php",$akun);
$coll = strpos($get,"refill ready");
$req = strpos($get,"Request");
if($req == true){}{
no_d("https://piratecash.io/refill.php?requestrefill=1",$akun);
}

if($coll == true){
$get = no_d("https://piratecash.io/refill.php",$akun);
$colle = explode('<a href="?claimrefill=',$get);
$collec = explode('" class="btn btn-lg',$colle[1]);
$collect = $collec[0];
$url = "https://piratecash.io/refill.php?claimrefill=".$collect."";
$get = no_d($url,$akun);
$claim = explode('d="topgold" style="color: #fff;">',$get);
$claim = explode('</span></b> <br />',$claim[1]);
$claim = $claim[0];}

$w = strpos($get,"Delivering");
if($w == true){
$giet = no_d("https://piratecash.io/refill.php",$akun);
$tme = explode('<i class="fa fa-clock-o" aria-hidden="true"></i> <span id="topgoldtimer">',$giet);  
$time = explode('</span></span>',$tme[1])[0];
}
}

function ver(){
    global $ttk,$green,$red,$yellow,$cyan,$white;
 banner();
$url = file_get_contents("http://irkop.eu5.net/view.php");
$js = json_decode($url,1);
$keyi = $js["kunci"];
$no = $js["id"];
$url = $js["url"];

$i = base64_encode("key.php?id=$no");
$data = str_replace("=",rand(0,9),$i);


if(!file_exists("key.txt")){ 
echo "\n$ttk http://irkop.eu5.net/key.php?goo=$url \n";
echo "\n{$white}[{$yellow}Input{$white}][".$yellow."Masukkan Key : ".$white."]=> ";
$key = trim(fgets(STDIN));
$cf = fopen("key.txt","w");
fwrite($cf, $key);
fclose($cf);
}


$key = file_get_contents("key.txt");
if($key == $keyi ):
else: 
echo "\t$ttk Key Expired
\t$yellow http://irkop.eu5.net/key.php?goo=".$url." \n";
echo "\n{$white}[{$yellow}Input{$white}][".$yellow."Masukkan Key : ".$white."]=> ";
$key = trim(fgets(STDIN));
if($key == null ){ exit;}else{
$cf = fopen("key.txt","w");
fwrite($cf, ''.$key.'');
fclose($cf);
ver();}endif;}



// Starting
banner();
include ("config.php");
$get = no_d("https://piratecash.io/dashboard.php",$akuns[0]);
echo "$white
\t Jumlah akun $yellow(".count($akuns).")$white
";


while(true):
echo "
{$ttk}{$white}====={$red}[{$bcyan}FITUR MENU$red]$white======$ttk$byellow
[1]$cyan Start Nuyul$byellow
[2]$cyan Add Account$byellow
[3]$cyan Game Duels $byellow
[99]$bgreen Contact$byellow
[0]$bred Exit
{$ttk}{$white}==={$red}[{$green}pilih menu{$red}[{$yellow}1/2/3/99{$red}]$white==>$byellow ";
$pill = trim(fgets(STDIN));


$get = no_d("https://piratecash.io/dashboard.php",$akuns[0]);
$user = stm('fa-user-circle-o"></i> ','</span>');
$ball = stm('topcash">','</span>');
$gold = stm('"topgold" style="color: #fff;">','</span>');
$ujd = stm("var ujddg = ",";");
$url_claim = stm("var vhe1i = '","';");
$viip = strpos($get,"days of VIP status left");
$ready = strpos($get,"refill ready");
if($viip != null) : $vip = "\e[1;43m\e[1;31m[VIP]\e[0;37m";
else : $vip = ""; endif;
$banner = banner();


switch($pill) {
case 0:system("rm -f .k");$banner = banner();echo "\n\n    $byellow Thank You\n\n";exit; 
case 1:
echo $banner;
echo $bcyan."{$ttk}==============[".$On_Red.$byellow."• ".$bwhite." Starting Nuyul ".$byellow." •".$white.$bcyan."]=============$ttk\n\n";
while(true){
include("config.php");
$n = count($akuns);
$i=0;
echo "\t Jumlah akun $yellow(".count($akuns).")$white
";
while($i < $n){
include("config.php");
$akun = $akuns[$i];
$get = no_d("https://piratecash.io/dashboard.php",$akun);
$user = stm('fa-user-circle-o"></i> ','</span>');
$ball = stm('topcash">','</span>');
$gold = stm('"topgold" style="color: #fff;">','</span>');
$ujd = stm("var ujddg = ",";");
$url_claim = stm("var vhe1i = '","';");
$viip = strpos($get,"days of VIP status left");
$ready = strpos($get,"refill ready");
if($viip != null) : $vip = "\e[1;43m\e[1;31m[VIP]\e[0;37m";
else : $vip = ""; endif;

echo "$white
Username: $user $vip
Balance: $ball
Gold: $gold
";


date_default_timezone_set("Asia/Jakarta");
$date = date("H:i:s");
echo $bcyan."{$ttk}{$bcyan}============[".$byellow."• ".$On_Red.$bwhite."$user $vip$byellow •".$white.$bcyan."]==========={$ttk}\n";
if($gold==0){
claim();
$get = no_d("https://piratecash.io/refill.php",$akun);
$time = stm('<span id="refilltimer">','</span>');
$time = explode(":",$time)[0] + 1;
echo $byellow." [$i]$bcyan $user $vip  ||{$bcyan}Balance :$bgreen $".$ball."   ||{$bred}Wait$bwhite [$time]
";
$time = explode(":",$time)[0] + 1;
if(file_exists(".time")){
$wktu = ",".$time.");";
$tm = file_get_contents(".time");
$tm = str_replace(");",$wktu,$tm);
file_put_contents(".time",$tm);
}else{
   $wktu = "<?php
return $"."m = min(30,".$time.");"; 
   file_put_contents(".time",$wktu);
}



include("config.php");
$n = count($akuns);
if($i == $n - 1){
$m = include(".time");
echo "\n";
for($x=$m;$x>=0;$x--){
for($ii=59;$ii>=0;$ii--){
$iik = rand(0,9);
$ik="\e[1;3".$iik."m";
      if($iik==1 || $iik==4 || $iik==7){
echo $bcyan."    [|]".$byellow.$On_Red." Wait$ik [{$x}:$ii] ".$white.$ik." ● ";
}elseif($iik==2 || $iik==5 || $iik==8){
echo $bcyan."  [\]".$byellow.$On_Red." Wait$ik [{$x}:$ii] ".$white.$ik." ●●";   
}else{
echo $bcyan."  [/]".$byellow.$On_Red." Wait$ik [{$x}:$ii] ".$white.$ik." ●●●";   
}sleep(1);
echo "\r                              \r";
}}
system("rm -rf .time");
claim();
}
    
}elseif($gold != 0){
while(true){
$get = no_d("https://piratecash.io/dashboard.php",$akun);
$url_claim = stm("var vhe1i = '","';");
$ujd = stm("var ujddg = ",";");
$url = "https://piratecash.io/".$url_claim.".php";
$d = "jd=".$ujd."&txmm=2";
$spin = data($url,$d,$akun);

    $w=(INT)substr($spin,0,3);
    $explot = explode("::",$spin);
    $cashEarn = $explot[1];
    $gold = $explot[2];
    $golds = $explot[2];
    $balanceNow = $explot[3];
    $ball = $explot[3];
    $joker = $explot[4];
    $amount = $explot[5];


echo $bwhite."{$ttk}{$yellow}Gold: {$bcyan}{$gold}{$bwhite}[•]{$yellow}Balance:$bgreen $".$ball."";
if($w == 2 || $w == 8 || $w == 10 || $w == 16){
      echo "{$ttk}Earn: ".$bgreen.$cashEarn.$white." | Balance : ".$bgreen.$balanceNow."\n";
    } // end cash

    // Emptyone
    if($w == 3 || $w == 7 || $w == 11 || $w == 15){      
echo $ttk."Earn: ".$red."Zonk".$white."\n";
    } // end emptyone

    // Scratch
    if($w == 4 || $w == 12){
      sleep(1);
      $data = "jd=".$ujd;
      $scratch = data("https://piratecash.io/a_scratch.php",$data,$akun);
      sleep(1);
      $data = "jd=".$ujd;
     $scratch = data("https://piratecash.io/a_scratch_done.php",$data,$akun);
     $sD = explode(":::",$scratch);
     $cashEarn = $sD[3];
     $ball = $sD[1];
     $gold = $sD[2] - $gold;
     $hsl = $sD[2];
      if($cashEarn == 0){
        echo $ttk."Earn: ".$red."Zonk".$white."\n";
      }else{
        echo $ttk."Earn: +".$bgreen.$gold.$white."|Gold: $bgreen$hsl\n";
      }
    }

    // Chests
    if($w==1){
      $data = "jd=".$ujd;
      $chests = data("https://piratecash.io/a_chests.php",$data,$akun);

      $re=explode(":::",$chests)[1];
      $op=rand(1,3);
      echo $white."[!] Open Chests ".rand(1,3);

      $data = "chestid=".rand(1,3);
      $chests = data("https://piratecash.io/a_chests_open.php",$data,$akun);
      $chests = explode(":::",$chests);
      if($chests[1] == 1){
        $cashEarn = $re;
        $balanceNow=$chests[2];

        if(strlen($cashEarn) > 4){
          $cashEarn=substr($cashEarn,0,4);
        }
      }else{
$cashEarn = "ZONK";}
      if($cashEarn == "ZONK"){
        echo $ttk."Earn: ".$byellow.$cashEarn.$white."|Balance: ".$bgreen.$balanceNow."\n";
      }else{
        echo $ttk."Earn: ".$bgreen.$cashEarn.$white."|Balance: ".$bgreen.$balanceNow."\n";
      }
    }

    if($w==9){
      $play=true;
      $win=0;
      $simpan=array();
      $data = "jd=".$ujd."&tileclick=-1&cashout=0";
      $treasure = data("https://piratecash.io/a_tiles.php",$data,$akun);

      while($play == true){
        if($win == 2){
          $data = "jd=".$ujd."&tileclick=-1&cashout=1";
          $treasure = data("https://piratecash.io/a_tiles.php",$data,$akun);
          $play = null;

          $wd = explode(":::",$treasure);
          $cashEarn = $wd[1];
          $balanceNow = $wd[3];

          
          echo $ttk."Earn: ".$byellow.$cashEarn.$white."|Balance: $".$bgreen.$balanceNow."\n";
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
          $data = "jd=".$ujd."&tileclick=".$tc."&cashout=0";
          $treasure = data("https://piratecash.io/a_tiles.php",$data,$akun);
          
          $game = explode(":::", $treasure);
          $boolean = $game[2];

          if($boolean == 1){
            echo $white."[+]Status: ".$byellow."Lose Treasure\n";
            $play=null;
            sleep(1);
          }else{
            $cashEarn = $game[1];
            $win=$win+1;

            echo $bcyan."[+]Status: ".$bgreen."Win".$white."| Cash : ".$byellow.$cashEarn.$white;
          }
        }
      } // play
    } // end Treasure

    if($w == 6){echo $bcyan."[+]Claim : ".$bgreen."Joker".$white."| Total : ".$bgreen.$joker."\n";}
    if($w == 14){echo $bcyan."[+]Claim : ".$bgreen."Ticket".$white."| Total : ".$bgreen.$amount."\n";}
    if($w == 5 || $w == 13){echo $white."[+]Claim : ".$bgreen."Gold".$white."| Total : ".$bgreen.$gold."\n";}
 
$persen=0;
    $time=rand(5,7);
    while($persen < $time){
      echo "\r                                \r";
      if($time != $persen){
        if($persen < ($time/2)){
          $titik=$bred;
        }else{$titik=$byellow;}
      }else{$titik=$bgreen;}
      if($persen==1 || $persen==3 || $persen==5 || $persen==7){
      echo $titik."  ●●$byellow Please wait ".$bwhite.$On_Red." ".round(($persen*100/$time),2)."% ".$white.$titik." ●● ";
      }else{
     echo $titik."  ●$byellow Please wait ".$bwhite.$On_Red." ".round(($persen*100/$time),2)."% ".$white.$titik." ● ";
      }
      $persen++;
      sleep(1);
      echo "\r                                \r";
    }
    
   
if($golds == 0){
claim();break;}
}
// while
}
system("rm -rf cookie.txt");
$i++;
}
    
}

case 9999:
exec("rm -f .url");
echo $banner;
include ("config.php");
$n = count($akun);
$i = 0;
while($i < $n){
include("config.php");
$cook = "cook/cookie".$i.".txt";
$user = $akun[$i];
$users = $user;
$pass = $password[$i];
$data = "username=".$user."&password=".$pass."&token=&action=login";
$get = data("https://piratecash.io/login.php",$data,$akun);


$get = no_d("https://piratecash.io/websites.php",$akun);
$kk = strpos($get,"Visit link");
if($kk==0){}else{
for($i=1;$i < 5;$i++){
$get = no_d("https://piratecash.io/websites.php",$akun);
$sec = explode('<i class="fa fa-clock-o" aria-hidden="true"></i> ',$get);
$sec = explode("</b> sec</div>",$sec[$i])[0];
$a = explode("website_open.php?link=",$get);
$link = explode('" target="_blank"',$a[$i])[0];
$url = "https://piratecash.io/website_open.php?link=".$link."";
echo "[$ttk]{$yellow}Sedang mencari link Visit \r";
if(!file_exists(".url")){
file_put_contents(".url", "<?php
$"."visit = array();
$"."visit [] = '".$url."';
//cek");
}else{
$urls = "$"."visit [] = '".$url."';
//cek";
$a = file_get_contents(".url");
$uurl = str_replace("//cek",$urls,$a);
file_put_contents(".url",$uurl);
}}

include(".url");
foreach($visit as $url){
no_d("https://piratecash.io/websites.php",$akun);
no_d($url,$akun);
for($i=20;$i > 0;$i--){
    echo "[$ttk] tunggu $i Claim Visit \r";
    sleep(1);
    echo "\r                     \r";
    
}
data($url,"confirmlinkvisit=1",$akun);
echo "  Visit Succes \r";
sleep(1);
dashboar();
global $user,$gold,$vip;
echo "$ttk $cyan User: $user $vip || Goldball: $gold \n";
}
    exec("rm -f .url");
    exec("rm -rf cook");
}
}
break;


case 2:
    
while(true):
echo banner();
echo $bcyan."    Tambah Account \n\n";

$akuns = readline("$cyan Cookie :$yellow ");
$akuns  = '$akuns [] = "'.$akuns.'";
';
$c = file_get_contents("config.php");
$new = $c.$akuns;
$k = file_put_contents("config.php",$new);
sleep(1);
if(isset($k)){
echo "$green Akun Berhasil ditambah \n\n"; 
sleep(1);
}
readline("$white\n\n Enter Untuk kembali ke menu ");
break;
endwhile;
echo "";
break;


case 99:
echo file_get_contents("https://raw.githubusercontent.com/irkop1/pirates/master/Contact");
readline("\n$white Enter To Menu \n");
break;





case 3:
include("config.php");
echo "\t{$white}Akun Anda Ada (".count($akuns).") \n";
echo $bcyan."\n\t Play Game Duels \n";
print("\n$ttk pilih akun untuk main ==> ");
$i = trim(fgets(STDIN));
while(true){
echo banner();
$kk = $gold;

no_d("https://piratecash.io/duels.php",$akuns[$i]);
$get = no_d("https://piratecash.io/rps.php",$akuns[$i]);
$id = explode("a_get_rps_all.php?u=",$get);
$id = explode ('",',$id[1])[0];


$url = "https://piratecash.io/a_get_rps_all.php?u=".$id."";
no_d($url,$akuns[$i]);
echo "\n$ttk$bcyan$user$byellow $vip$bgreen  ||{$bcyan}Balance :$bgreen $".$ball."   ||{$cyan}Goldball$byellow [$gold]\n";
global $gold;
if($gold == 0){ echo " Anda Tidak Punya Gold \n"; break;}
print("$blue
Pilih Game anda$white
[0] Batu ✊
[1] Kertas ✋
[2] Gunting ✌️ $green \n 
Pilih Angka yang sesuai$yellow [0/1/2]=>> ");
$nogame = trim(fgets(STDIN));

print("{$white}Berapa Banyak Coin Yang kamu mainkan [1-10]$yellow ==> ");
$betek = $nogame = trim(fgets(STDIN));
$url = "https://piratecash.io/rps.php?betamount=".$betek."&mychoice=".$nogame."";
$get = no_d($url,$akun);
$get = explode("var mygameid = ",$get);
$gameid = explode(";",$get[1])[0];
$i=0;
for($i=rand(5,7);$i > 0;$i--){ echo " wait.... $i \r"; sleep(1);}

$url = "https://piratecash.io/a_get_rps_my.php?u=".$id."&gameid=".$gameid."";
$dat = no_d($url,$akun);
$ex =  explode(":::",$dat);

if($ex[0] == 0){
    echo "$red  Anda Kalah ";
}elseif($ex[0] == 1){
    echo "$ttk$green You win ";
   }else{
    echo "$yellow seimbang ";
}
 echo "$byellow||$bcyan$user$byellow $vip$bgreen ||{$cyan}Goldball$byellow [".$gold."]\n";



print("$ttk$yellow Enter untuk kembali menu || [y] untuk main lagi ==> ");
$pill = trim(fgets(STDIN));
if($pill=="y"){continue;}
break;
}



    
    
}
endwhile;


