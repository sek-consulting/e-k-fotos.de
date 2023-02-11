<!-- PORTFOLIO -->
<section class="pt-16">
    <div class="container mx-auto py-12 text-center">
        <h1 class="font-heading font-medium text-4xl md:text-6xl mb-4">
            Peoplefotografie
        </h1>
        <?= Gallery::init()
                ->from_path_shuffled("img/people")
                ->build() ?>
    </div>
</section>
