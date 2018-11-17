    </main>

    <footer class="document__footer">
      <? snippet('modules/footer-content') ?>
    </footer>

    <?= js([
      Help::versioned_asset_url('js', 'app.js')
    ]) ?>
  </body>
</html>
