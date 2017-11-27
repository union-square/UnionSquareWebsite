
<!-- <?php require'header.inc.php' ?> -->
<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Union Square</title>
	<meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css/stylesheet.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
  	<header>
  		<div id="mainLogo"></div>
  		<nav id="mainMenu">
  			<ul>
  				<li><a href="#">Acceuil</a></li>
  				<li><a href="#">Equipe</a></li>
  				<li><a href="/form.php">Contact & devis</a></li>
  			</ul>
  		</nav>
  	</header>
  	<svg id="svgTop" height="43" width="100%">
        <polygon points="0,43 137,43 137,0" style="fill:rgba(216,216,216,0.15)" />
    </svg>
  	<main>
  		<div id="intro">
        <div id="introBlock">
          <h1>Solution complète</h1>
          <span class="sep"></span>
          <p class="expTxt">
            Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.
          </p>
          </div>
  		</div>
  		<svg id="svgBl" height="90" width="300">
        <polygon points="0,90 300,0 0,0" style="fill:rgba(216,216,216,0.15);stroke:rgba(216,216,216,0.15);stroke-width:1" />
      </svg>
  		<div id="content">
  			<div class="exp">
          <div class="expTxtBox">
            <h2>Developpement</h2>
            <span class="sep"></span>
            <p class="expTxt">
              Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.
            </p>
          </div>
  			<div class="ilu" id="iluTop"></div>		
  		</div>
  		<svg height="90" width="300">
          <polygon points="0,90 300,0 0,0" style="fill:white" />
        </svg>
  		<div class="exp" id="expMid">
  			<div class="ilu" id="iluMid"></div>
          	<div class="expTxtBox">
            	<h2>Web design (ui / ux)</h2>
            	<span class="sep"></span>
	            <p class="expTxt">
	              Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.
	            </p>
        	</div>
  		</div>
  		<div class="exp">
          <div class="expTxtBox">
            <h2>SEO & webmarketing</h2>
            <span class="sep"></span>
            <p class="expTxt">
              Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis.
            </p>
          </div>
  				<div class="ilu" id="iluBot"></div>
  			</div>
  		</div>
  	</main>
	<footer>
		<div class="logoBot"></div>
		  <nav id="menuBot">
			<ul>
		    	<li><a href="#">Cookies</a></li>
		  		<li><a href="#">Mention légales</a></li>
		  		<li><a href="#">Contact</a></li>
			</ul>
		  </nav>
	  <div id="sign">
	  	<p>
	  		Site biologique réalisé en bois recyclé<br>
	  		(On sait faire des blagues aussi...)  
	  	</p>
	  	<p>
	  		&copy; 
	  		<?php
				$copyYear = 2017; // Set your website start date
				$curYear = date('Y'); // Keeps the second year updated

				echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
			?>
			Union Square
		</p>
	  </div>
	</footer>

  	<script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
<!-- <?php require 'footer.inc.php';?> -->