<?php 
ajouter_vue()
?>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        Le site a été vu <?= nombre_vues() ?> fois
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h5>Navigation</h5>
        <ul class="list-unstyled text-small">
          <?= nav_menu(); ?>
        </ul>
      </div>
    </div>
</div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      
  </body>
</html>