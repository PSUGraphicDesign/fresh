<div class="footer">
  <div class="footer__content">
    <div class="footer__about">
      <div class="text-content">
        <?= $site->about()->kirbytext() ?>
      </div>
    </div>
    <div class="footer__credits">
      <div class="text-content">
        <?= $site->credits()->kirbytext() ?>
      </div>
    </div>
    <div class="footer__archive">
      <div class="text-content">
        <?= $site->alumni_preview()->kirbytext() ?>
      </div>
      <a class="footer__archive-link" href="<?= page('archive')->url() ?>">Past Grads</a>
    </div>
  </div>
</div>
