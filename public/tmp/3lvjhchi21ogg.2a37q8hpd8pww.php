<html>

<head>
  <title>Pasties</title>
  <link rel="stylesheet" href="css/style.min.css">
  <link rel="stylesheet" href="css/prism.css">
</head>

<body>
  <?php echo $this->render('../templates/partials/header.html',NULL,get_defined_vars(),0); ?>
  <main id="pasties-container">
    <div class="pasties-list">
      <?php echo $this->render('../templates/partials/pasties-sidebar.html',NULL,get_defined_vars(),0); ?>
    </div>
    <div class="pasties-display">
      <?php echo $this->render('../templates/partials/pasties-display.html',NULL,get_defined_vars(),0); ?>
    </div>
    <section class="button-container">
      <button class="add-pastie" type="button" name="add-pastie">New Pastie</button>
    </section>
    <section class="new-pastie">
      <h2 class="new-pastie-header">New Pastie</h2>
      <div class="pastie-form">
        <div class="pastie-title">
          <label for="pastie-title">Title:
            <input type="text" placeholder="Title">
          </label>
        </div>
      </div>
    </section>
  </main>
  <?php echo $this->render('../templates/partials/footer.html',NULL,get_defined_vars(),0); ?>
  <!-- js here -->
  <script src="/js/prism.js"></script>
  <script src="/js/app.js"></script>
</body>

</html>