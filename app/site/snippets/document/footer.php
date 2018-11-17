    </main>

    <footer class="document__footer">
      <? snippet('modules/footer') ?>
    </footer>

    <?= js([
      Help::versioned_asset_url('js', 'app.js')
    ]) ?>
  </body>
</html>
