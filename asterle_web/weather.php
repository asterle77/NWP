<?php
date_default_timezone_set('Europe/Zagreb');
$datum_danas = new DateTimeImmutable();


$dhmz = 'https://prognoza.hr/tri/3d_graf_i_simboli.xml';

//$podaci = simplexml_load_file("test_podaci.xml") or die("Cant load xml file!");

$podaci = simplexml_load_file($dhmz) or die("Cant load xml file!");

$danas = array();
$sutra = array();
$prekosutra = array();

foreach ($podaci->grad as $grad){
    if($grad['ime'] == 'Sisak' ){        
        foreach($grad as $dan){
            if(strcmp($dan['datum'], $datum_danas->format('d.m.Y.')) == 0){
                array_push($danas, $dan);
            }
            elseif(strcmp($dan['datum'], $datum_danas->modify('+1 day')->format('d.m.Y.')) == 0){
                array_push($sutra, $dan);
            }
            elseif(strcmp($dan['datum'], $datum_danas->modify('+2 day')->format('d.m.Y.')) == 0){
                array_push($prekosutra, $dan);
            }
        }
    }

}

print '
		<div class="weather">
			<div class="w_forecast">
                <h1>' . $datum_danas->format('d.m.Y.') . '</h1>';
                foreach($danas as $jedan){
print           '<div>
                    <h2>' . $jedan['sat'] . ' o\'clock</h2>
                    <img src="weather/' . $jedan->simbol . '.png">
                    <div>
                        <h2>' . $jedan->t_2m . '°C</h2>
                        <img src="weather/wind/' . $jedan->vjetar . '.png"> 
                    </div>
                </div>';
                }
print       '</div>
            <div class="w_forecast">
                <h1>' . $datum_danas->modify('+1 day')->format('d.m.Y.') . '</h1>';
                foreach($sutra as $jedan){
print           '<div>
                    <h2>' . $jedan['sat'] . ' o\'clock</h2>
                    <img src="weather/' . $jedan->simbol . '.png">
                    <div>
                        <h2>' . $jedan->t_2m . '°C</h2>
                        <img src="weather/wind/' . $jedan->vjetar . '.png">
                    </div>
                </div>';
                }
print       '
            </div>
            <div class="w_forecast">
                <h1>' . $datum_danas->modify('+2 day')->format('d.m.Y.') . '</h1>';
                foreach($prekosutra as $jedan){
print           '<div>
                    <h2>' . $jedan['sat'] . ' o\'clock</h2>
                    <img src="weather/' . $jedan->simbol . '.png">
                    <div>
                        <h2>' . $jedan->t_2m . '°C</h2>
                        <img src="weather/wind/' . $jedan->vjetar . '.png">
                    </div>
                </div>';
                }
print'
            </div>            
		</div>
        <div class="disclamer">
            <p><b>Podaci preuzeti sa stranice DHMZ-a, datoteke su ustupljene pod <a href="https://data.gov.hr/otvorena-dozvola" target=_blank>otvorenom dozvolom</a>.</b></p> 
            <p>' . $podaci->izmjena . '</p>
            <a href="' . $dhmz .'" target=_blank>Link prema korištenim podacima</a>
        </div>';

// na linku su podaci za Sisak preko stranice dhmz-a pa se moze provjeriti URL:https://meteo.hr/prognoze.php?Code=Sisak&id=prognoza&section=prognoze_model&param=3d
?>