# geonames-city-api

This is a simple api created using the php microframework Slim  <a href="http://www.slimframework.com/">http://www.slimframework.com/</a>
that uses data from <a href="http://www.geonames.org/">www.geonames.org</a>

Simply download the data dump from this page: <a href='http://download.geonames.org/export/dump/'>http://download.geonames.org/export/dump/</a>
and import it into a sqlite db file (cities15000.txt, cities5000, etc).

# Usage 

In index.php, simply add your geonames converted sqlite file into <code>$db  = new PDO("sqlite:/path/to/db");</code>

Example call operates as shown: 
<code>http://localhost/cities/api/city?name='London'&country='GB'</code>

Will return the following in JSON format:
<code>
	{
  "gid": "2643743",
  "iso": "GB",
  "name": "London",
  "asciiname": "London",
  "latitude": "51.50853",
  "longitude": "-0.12574",
  "timezone": "Europe/London",
  "population": "7556900",
  "elevation": "",
  "alternate_names": "City of London,Gorad Londan,ILondon,LON,Lakana,Landen,Ljondan,Llundain,Londain,Londan,Londar,Londe,Londen,Londinium,Londino,Londn,London,London City,Londona,Londonas,Londoni,Londono,Londonu,Londra,Londres,Londrez,Londri,Londye,Londyn,Londýn,Lonn,Lontoo,Loundres,Luan GJon,Lunden,Lundra,Lundun,Lundunir,Lundúnir,Lung-dung,Lunnainn,Lunnin,Lunnon,Luân Đôn,Lùng-dŭng,Lākana,Lůndůn,Lọndọnu,Ranana,Rānana,The City,ilantan,landan,landana,leondeon,lndn,london,londoni,lun dui,lun dun,lwndwn,lxndxn,rondon,Łondra,Λονδίνο,Горад Лондан,Лондан,Лондон,Лондонъ,Лёндан,Լոնդոն,לאנדאן,לונדון,لندن,لوندون,لەندەن,ܠܘܢܕܘܢ,लंडन,लंदन,लण्डन,लन्डन्,লন্ডন,લંડન,ଲଣ୍ଡନ,இலண்டன்,లండన్,ಲಂಡನ್,ലണ്ടൻ,ලන්ඩන්,ลอนดอน,ລອນດອນ,ལོན་ཊོན།,လန်ဒန်မြို့,ლონდონი,ለንደን,ᎫᎴ ᏗᏍᎪᏂᎯᏱ,ロンドン,伦敦,倫敦,런던",
  "feature_class": "P",
  "feature_code": "PPLC",
  "cc2": "",
  "admin1_code": "ENG",
  "admin2_code": "GLA",
  "admin3_code": "",
  "admin4_code": "",
  "dem": "25",
  "updated": "2015-06-03"
}
</code>