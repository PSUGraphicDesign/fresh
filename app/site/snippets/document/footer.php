    </main>

    <footer class="document__footer js-document__footer">
      <?php snippet('blocks/footer') ?>
    </footer>

    <?= js([
      Help::versioned_asset_url('js', 'app.js')
    ]) ?>
  </body>
</html>
