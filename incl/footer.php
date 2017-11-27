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