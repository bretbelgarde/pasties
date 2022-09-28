<html>
  <head>
    <title>Pasties</title>
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/prism.css">
  </head>
  <body>
    <?php echo $this->render('../templates/partials/header.html',$this->mime,get_defined_vars(),0); ?>
    <main id="pasties-container">
      <div class="pasties-list">
        <?php if ($DATA['pasties_list']): ?>
          Do Pasties Stuff Here
          <?php else: ?>Sorry, no pasties available.
        <?php endif; ?>
      </div>
      <div class="pasties-display">
        <pre><code class="lang-<?php echo $DATA['pastie']['contentType']; ?> line-numbers"><?php echo $DATA['pastie']['pastedContent']; ?></code></pre>
      </div>
      <section class="button-container">
        <button type="button" name="edit-pastie">Edit Pastie</button>
        <button type="button" name="add-pastie">New Pastie</button>
      </section>
    </main>
    <?php echo $this->render('../templates/partials/footer.html',$this->mime,get_defined_vars(),0); ?>
  <!-- js here -->
  <script src="/js/prism.js"></script>
  <script src="/js/app.js"></script>
  </body>
</html>
