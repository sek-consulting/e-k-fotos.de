<!-- PORTFOLIO -->
<section class="pt-16">
    <div class="container mx-auto py-12 text-center">
        <h1 class="font-heading font-medium text-4xl md:text-6xl mb-4">
            Werbefotografie
        </h1>
        <?= Gallery::init()
                ->from_path_shuffled("img/product")
                ->build() ?>
    </div>
</section>