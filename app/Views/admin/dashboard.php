<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hello, <?= session()->get('firstname') ?></h1>
      <div class="dash-container">
        <h3>Edit Options</h3>
        <div class="dash-navigation">
          <span class="cta-btn">
            <a href="/menu">
              Menu
            </a>
          </span>
          <span class="cta-btn">
            <a href="/pages">
              Pages
            </a>
          </span>
          <span class="cta-btn">
            <a href="/gallery">
              Gallery
            </a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
