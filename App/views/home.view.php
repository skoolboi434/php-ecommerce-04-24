<?php loadPartial('header'); ?>
<?php loadPartial('hero'); ?>


<div class="container">
  <?= loadPartial('message'); ?>
  <section class="featured-products">
    <div class="heading-container my-5">
      <h3>Featured Products</h3>
    </div>

    <div class="row">
      <?php foreach ($products as $product): ?>
      <div class="col-md-3 mb-3">
        <div class="product-card">
          <div class="img-container mb-3">
            <a href="/products/<?= $product->id ?>">
              <img src="../uploads/<?= $product->featured_image ?>"
                class="img-fluid" alt="<?= $product->name ?>">
            </a>
          </div>
          <div class="product-info">
            <h4 class="product-brand">
              <?= $product->brand; ?>
            </h4>
            <p class="product-title">
              <?= $product->name; ?>
            </p>
            <span class="deck-size d-block mb-2">
              <?= $product->size; ?>"
            </span>
            <span class="price"><strong>
                <?= formatPrice($product->price); ?>
              </strong></span>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </section>

  <section class="brands-container">
    <div class="heading-containe my-5">
      <h3>Brands</h3>
    </div>
    <div class="row">
      <?php foreach ($brands as $brand): ?>
      <div class="col-md-3 brand-card-container">
        <a href="/products/brands/<?php echo $brand->brand; ?>"
          class="brand-card">
          <?php echo $brand->brand; ?>
        </a>
      </div>
      <?php endforeach ?>
    </div>
  </section>

</div>

<?php loadPartial('footer'); ?>