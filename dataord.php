<?php
session_start();
include('config.php');
// Validating Session
if(strlen($_SESSION['userlogin'])==0)
{
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html>
<head>
<title>Gamesphere - Dataord</title>
<link rel="stylesheet" href="css/back.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
</head>
<body>
    <a href="welcome.php"><img src="img/logo.jpg"></a>
    <div class="navbar">
        <a href="welcome.php">Hem</a>
        <div class="dropdown">
          <button class="dropbtn">Underhållning
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <div class="header">
              <h2>Underhållning</h2>
            </div>   
            <div class="row">
              <div class="column">
                <a href="underhallning.php">Onlinespel</a>
                <a href="underhallning.php">Videos</a>
                <a href="underhallning.php">Bilder</a>
             </div>
            </div>
          </div>
        </div> 
        <a href="dataord.php">Dataord</a>
        <form>
        <input type="text" id="search" name="search" placeholder="Sök...">
        <input type="button" id="button" name="button" value="Sök">
        
        <div class="dropdown">
            <button class="dropbtn">Profil
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <div class="header">
               <?php
// Code for fecthing user full name on the bassis of username or email.
$username=$_SESSION['userlogin'];
$query=$dbh->prepare("SELECT  FullName FROM userdata WHERE (UserName=:username || UserEmail=:username)");
      $query->execute(array(':username'=> $username));
       while($row=$query->fetch(PDO::FETCH_ASSOC)){
        $username=$row['FullName'];
       }
       ?>
          <h1>Välkommen <font face="Tahoma" color="red"><?php echo $username;?> ! </font></h1>
          <br />
 <a href="myprofile.php" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Min Profil</a>
 <a href="settings.php" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Inställningar</a>
          <a href="logout.php" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Logga ut</a>
        </div>
        <br />
<script type="text/javascript">
</script>
              </div>   
              </div>
            </div>
          </div>
        </form> 
      </div>
<div class="front2">
  <h1>Dataord</h1>
        
        <div id="divmenu">
            <ul>
              <li><a href="dataord.php#A">A</a><li>
              <li><a href="dataord.php#C">C</a><li>
              <li><a href="dataord.php#D">D</a><li>
              <li><a href="dataord.php#F">F</a><li>
              <li><a href="dataord.php#G">G</a><li>
              <li><a href="dataord.php#H">H</a><li>
              <li><a href="dataord.php#J">J</a><li>
              <li><a href="dataord.php#K">K</a><li>
              <li><a href="dataord.php#L">L</a><li>
              <li><a href="dataord.php#M">M</a><li>
              <li><a href="dataord.php#N">N</a><li>
              <li><a href="dataord.php#P">P</a><li>
              <li><a href="dataord.php#Q">Q</a><li>
              <li><a href="dataord.php#R">R</a><li>
              <li><a href="dataord.php#S">S</a><li>
              <li><a href="dataord.php#U">U</a><li>
              <li><a href="dataord.php#V">V</a><li>
              <li><a href="dataord.php#Z">Z</a><li>
            </ul>
</div>


 <a name="A"><h1>A</h1></a>
    <p>ADSL: Asynchronus Digital Substriker Line,<br> en mycket bra teknik f&ouml;r ett snabbare data&ouml;verf&ouml;ring via ett telefonjack,<br> det bli lite h&ouml;gre hastighet &auml;n modemet,<br> ADSL &auml;r mellan 500 kilobit/sekund och 1 megabit/sekund &auml;r vanligt.</p>
	<p>Animated GIF: Bildformatet GIF &aumlr f&ouml;r att visa r&ouml;rliga bilder.<br> En Animated GIF inneh&aring;ller m&aring;nga stillbilder som r&ouml;r sig i f&ouml;ljd, n&auml;r man &auml;r inne p&aring; internet.</p>
	<p>AVI: Audio Video Interleaved,<br> ett format f&oumlr filmer som har gjorts av Microsoft.<br> AVI &aumlr ett vanligt format f&ouml;r filmer i internet.</p>
 
  
    <a name="C"><h1>C</h1></a>
    <p>Cache: ett mellanlagringsminne p&aring; om den &auml;r en snabb eller en l&aring;ngsam enhet i ett datorsystem.<br> N&auml;r informationen l&aumlser fr&aring;n den l&aring;ngsama enheten,<br> d&aring; g&ouml;r den en kopia av det l&auml;sta cache-minnet.<br> I s&aring; fall tar den det d&auml;r ifr&aring;n och d&aring; g&aring;r det snabbare, <br>n&auml;r det blir fullt p&aring; cachen offras den &auml;ldsta informationen.</p>
    <p>CD-ROM: Compact Disc Read Only Memory,<br> en skiva som &auml;r l&ouml;stagbar och har h&ouml;g kapacitet f&ouml;r att lagra information med en CD-l&auml;sare, <br>ger ett skivminne med l&ouml;stagbar skiva,<br> lagringsprincipen &auml;r lite annorlunda &auml;n hos t.ex. <br>En diskett eller en h&aring;rddisk och det bygger p&aring; en optisk l&auml;sning av den lagrade informationen. <br>En smal laserstr&aring;le lyser p&aring; den roterande skivytan och kan f&ouml;ras in i skivans centrum och ut mot dess kant av en l&auml;sarm.<br> Laserstr&aring;len studsar p&aring; olika s&auml;tt p&aring; skivan och det beror p&aring;, vad platsen d&auml;r str&aring;len lyser,<br> om det &auml;r en blank och plan yta eller en liten grop.</p>
	<p>CD-RW: Compact Disc Rewritable,<br> en CD-ROM som till&aring;ter att skriva information till CD-RW skivor,<br> den teknik som finns p&aring; en CD-RW skiva &aumlr att den kan raderas och &auml;ndras m&aring;nga g&aring;nger p&aring; CD-RW skivan,<br> skriva/&auml;ndra information p&aring; en CD-RW skiva sker med speciella CD-RW br&auml;nnare som kan ocks&aring; skriva till vanliga CD-R skivor med.</p>
	<p>Chassifl&aumlkt: En fl&aumlkt som ska kyla ned chassit.</p>
	<p>CPU-Kylare: En fl&aumlkt som kyler ned processorn f&oumlr att det inte ska bli &oumlverhettad.</p>


    <a name="D"><h1>D</h1></a>
    <p>Drivrutin: Ett programavsnitt som hanterar olika resurser i datorsystemet,<br> t.ex. Bildsk&auml;rmskort, ljudkort eller n&aring;t annat, med hj&auml;lp av drivrutiner,<br> kan m&aring;nga delar av datorsystemet kommunicera med m&aring;nga andra resurser med en fr&aring;ga att anv&auml;nda den.</p>
    <p>DVD: Digital Versatile Disc, likt en vanlig CD, fast den kan lagra mer information &auml;n vanliga CD-skivor kan.</p>
	<p>Datorchassi: Sj&auml;lva skalet man s&auml;tter in delarna i.</p>


    <<a name="F"><h1>F</h1></a>
    <p>Fil: En samling med information som h&ouml;r ihop och lagras i ett datorsystem.<br> Vid olika tidpunkter kan n&aring;gra filer eller en del av filer som anv&auml;nds, just d&aring;, &auml;ven finns i datorns RAM-minne</p>
	<p>FTP: File Transfer Protocol, en standard f&ouml;r att &ouml;verf&ouml;ra filer till internet.</p>
  
    <a name="G"><h1>G</h1></a>
    <p>GIF: Graphics Interchange Format, ett lagringsformat f&ouml;r bilder. GIF-formatet har ett icke-f&ouml;rst&ouml;rande<br> kompression som minskar storleken p&aring; den lagrade filen, utan att bildkvaliten f&ouml;rs&auml;mras. <br>Kompressionen fungerar att den ska lagra bildens f&auml;rgkombinationer i en tabell och sedan ska den referera till tabellen.<br> N&aumlr samma f&aumlrgkombinationer senare dyker upp igen i bilden. En GIF-bild kan inneh&aring;lla mest som 256 f&auml;rgnyanser,<br> den h&aumlr &auml;r inte gjord f&oumlr foto och liknande, p&aring; det omr&aring;det ger JPEG-formatet, vanligen b&aumlttre resultat.</p>
	<p>Grafikkort: Detta kort anv&aumlnds f&oumlr att ansluta en sk&aumlrm. Den har oftast sin egen processor och eget minne som hanterar grafik.<br> Ett bra grafikkort kr&auml;vs f&ouml;r att spela spel, som kr&auml;ver mycket grafik.</p>

    <a name="H"><h1>H</h1></a>
    <p>H&aring;rddisk: man sparar alltingen p&aring; den.</p>
  
    <a name="J"><h1>J</h1></a>
    <p>JPEG: Joint Photographers Expert Group, ett lagringsformat f&ouml;r bilder, den h&aumlr bildformatet har tagit sitt namn fr&aring;n gruppen som skapade det.<br> JPEG-bilder inneh&aring;ller &ouml;ver 16 miljoner f&auml;rgnyanser och har en f&ouml;rst&ouml;rande komprimering som minskar dens lagrade filens storlek, <br>mycket kraftigt. Komprimeringen fungerar genom att lagra bildens f&aumlr;gnyanser och ljusstyrkor f&oumlr sig, <br>den j&auml;mna ut framf&ouml;r allt f&auml;rgnyanserna i rutor om 8 x 8 bildpunkter.</p>
 
    <a name="K"><h1>K</h1></a>
    <p>Klockfrekvens: Hastigheten p&aring; de klockpulser som synkroniserar och styr processorns arbete,<br> klockfrekvensen, den m&aumlts i megahartz (MHZ, miljoner klockpulser per sekund)<br> eller gigahartz (GHZ, miljarder klockpulser per sekund) ger en uppfattning om datorna prestanda,<br> v&auml;rden inneb&aumlr generellt h&ouml;gre prestanda.</p>
	<p>Kylpasta: En slags salva som man sm&ouml;rjer in processorn med, den kyler processorn f&ouml;r att det inte ska bli &ouml;verhettad.</p>
 
    <a name="L"><h1>L</h1></a>
    <p>Ljudkort: Ett kort som g&oumlr att du kan koppla in h&ouml;gtalare och h&oumlrlurar f&ouml;r att h&ouml;ra video och musik.</p>
  
    <a name="M"><h1>M</h1></a>
    <p>MP3: MPeg Audio Layer 3, ett lagringsformat f&oumlr ljud. MP3 &aumlr ett mycket bra format f&oumlr musik och &auml;r vanligt i internet,<br> den &aumlr k&auml;nd f&ouml;r h&oumlg ljudkvalitet.</p>
	<p>Moderkortet: En komponent som styr allt i datorn, du s&aumltter in processorn i den och m&aring;nga andra kort.</p>
 
    <a name="N"><h1>N</h1></a>
    <p>N&aumltverkskort: Ett kort som g&ouml;r att du kan bygga n&aumltverk och ansluta till internet.</p>
	<p>N&aumltaggregat: D&aumlr du kopplar in sladden till datorn, &aumlr &aumlven en fl&aumlkt och kan leda str&oumlm till h&aring;rddisk och kort.</p>
 
    <a name="P"><h1>P</h1></a>
    <p>Processor: Processorn s&aumltts in i moderkortet, finns tv&aring; olika m&aumlrken Intel och AMD.</p>

    <a name="Q"><h1>Q</h1></a>
    <p>Quicktime: ett lagringsformat f&oumlr r&oumlrliga bilder, den &aumlr skapat av dataf&oumlretaget Apple.<br> Quicktime &aumlr ett filformat f&oumlr videosekvenser och liknande r&oumlrliga bilder p&aring; internet, det &aumlr inte lika vanligt som MPEG-formatet.<br> Quicktime-filer kan ha namn med olika &aumlndelser, mycket vanligt &aumlr .mov, men &aumlven .qt f&oumlrekommer.</a></p>

    <a name="R"><h1>R</h1></a>
    <p>Rm: ett lagringsformat f&oumlr r&ouml&oumlrliga bilder, real media, rm &aumlr ett vanligt filformat f&oumlr videosekvenser<br> och r&oumlrliga bilder p&aring; internet. Den filen &aumlr k&aumlnt f&oumlr liten i f&oumlrh&aring;llande till l&aumlngden p&aring; filmen. Bildkvaliten &aumlr l&aumlgre &aumln hos MPEG-formatet,<br> syftet &aumlr den minsta m&oumljliga filstorleken, &aumlr den viktigaste faktorn.</p>
	<p>Router: Utrustning i paketf&oumlrmedlande datorn&aumlt, i praktiken fr&aumlmst internet, f&oumlr att skicka information till andra routrar.<br> N&aumlr informationen &oumlverf&oumlrs via internet bryts den ner i avsnitt, paket, som skicka lite var f&oumlr sig. Varje paket har mottagarens ip-adress<br>som f&oumlrst tas fram genom ett anrop till en name servers. Varje router kan med hj&aumllp av ip-adressen p&aring; paketen som kommer till vilken grannrouter,<br> paketen skall skickas vidare.</p>
	<p>RAM-Minne: En komponent som s&aumltts p&aring; moderkortet.</p>
  
    <a name="S"><h1>S</h1></a>
    <p>Spam: Email som inneh&aring;ller reklam, men m&aring;nga gilar inte detta, s&aring; l&aring;t bli att skriva in din email-adress p&aring; hemsidor,<br> som du inte vet om dom &aumlr ett seri&oumlst f&oumlretag eller inte.</p>
 
    <a name="U"><h1>U</h1></a>
    <p>USB: Universal Serial Bus, en anslutning som &aumlr mycket vanligt idag. Det finns 2 varianter, d&aumlr USB 1 har 2 hastigheter,<br> 1,5 megabit/sekund f&oumlr l&aring;gintensiva enheter och 12 megabit/sekund f&oumlr h&oumlgintensiva enheter som en zip-driva.<br> Den nyare USB 2 klarar &oumlverf&oumlringshastigheter upp till 480 megabit/sekund.</p>

    <a name="V"><h1>V</h1></a>
    <p>Virus: En kod eller program som kommer in i datorn mot din vilja. Viruset skadar oftast filer p&aring; h&aring;rddisken, virus sprider sig via mail.<br> F&oumlr virus &aumlr det viktigt att uppdatera sitt antivirusprogram och g&oumlra en back-up p&aring; sina filer p&aring; h&aring;rddisken.<br> &oumlpnna aldrig ett mail som kommer fr&aring;n n&aring;gon du inte k&aumlnner, virusscanna ist&aumlllet.</p>

    <a name="Z"><h1>Z</h1></a>
    <p>Zip-fil: En fil som &aumlr komprimerad och kallas packad, med programmet Winzip kan man packa upp s&aring;na filer. <br>Genom komprimeringen har filens storlek reducerats s&aring; att den tar mindre plats att lagra p&aring;, det g&aring;r snabbare att &oumlverf&oumlra till internet,<br> komprimeringen &aumlr icke-f&oumlrst&oumlrande, s&aring; att filen kan &aring;terst&aumlllas.</p>


<div id="divmenu">
            <ul>
              <li><a href="dataord.php#A">A</a><li>
              <li><a href="dataord.php#C">C</a><li>
              <li><a href="dataord.php#D">D</a><li>
              <li><a href="dataord.php#F">F</a><li>
              <li><a href="dataord.php#G">G</a><li>
              <li><a href="dataord.php#H">H</a><li>
              <li><a href="dataord.php#J">J</a><li>
              <li><a href="dataord.php#K">K</a><li>
              <li><a href="dataord.php#L">L</a><li>
              <li><a href="dataord.php#M">M</a><li>
              <li><a href="dataord.php#N">N</a><li>
              <li><a href="dataord.php#P">P</a><li>
              <li><a href="dataord.php#Q">Q</a><li>
              <li><a href="dataord.php#R">R</a><li>
              <li><a href="dataord.php#S">S</a><li>
              <li><a href="dataord.php#U">U</a><li>
              <li><a href="dataord.php#V">V</a><li>
              <li><a href="dataord.php#Z">Z</a><li>
            </ul>
</div>     
</div>
<?php } ?>
</body>
</html>