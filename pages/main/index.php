<!-- HERO -->
<div id="hero-bg" class="fixed top-0 left-0 h-screen w-screen bg-zinc-900 bg-[url('../img/bg_hero.webp')] bg-cover bg-center -z-10"></div>
<section class="h-screen flex items-center justify-center">
    <div class="flex-col text-center text-white z-10">
        <h1 class="mb-2 font-medium font-heading text-5xl md:text-7xl">
            leidenschaftlich, facettenreich, atmosphärisch.
        </h1>
        <p class="mb-4 text-xl md:text-2xl">
            Fotografie ist mehr als nur ein Foto.
        </p>
    </div>
    <div class="absolute top-0 left-0 h-full w-full flex items-end justify-center p-2">
        <img src="img/ui/down.svg" alt="Scrollen zum weiterlesen!" width="36" id="scroll-arrow" class="animate-bounce" />
    </div> 
     
    <div class="absolute top-0 left-0 h-full w-full flex items-end justify-end p-4 md:p-8">
        <a href="#contact">
            <div class="flex items-center justify-center rounded-full h-12 w-12 md:h-16 md:w-16 shadow-md shadow-black bg-teal-700 hover:bg-teal-900 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 fill-current" viewBox="0 0 42 42">
                    <path d="M35.768 34H5a5 5 0 0 1-5-5.001V5a5 5 0 0 1 5-5h31.999A5 5 0 0 1 42 5v37s-6.253-7.64-6.232-8ZM38 5.999a2 2 0 0 0-2-2H5.999a2 2 0 0 0-2 2V28a2 2 0 0 0 2 1.999H36c-.006 0 2 2.001 2 2.001V5.999Z"/>
                    <path d="M8 7.999h25.999V12H8V7.999ZM8 14.999h25.999V19H8v-4.001ZM8 21.999h25.999V26H8v-4.001Z"/>
                </svg>
            </div>
        </a>
    </div>  
</section>

<!-- HIGHLIGHTS -->
<section class="py-12 bg-zinc-50">
    <div class="container mx-auto">
        <?= Gallery::init()
                ->from_path("img/highlights")
                ->build() ?>
    </div>
</section>

<!-- ABOUT ME -->
<section class="py-12 bg-zinc-200">
    <div class="container mx-auto flex flex-col md:flex-row">
      
        <!-- left column -->
        <div class="md:w-1/2 p-4 flex justify-center md:justify-end items-center">
            <img src="img/me.webp" class="max-w-full md:max-w-sm" />
        </div>
      
        <!-- right column -->
        <div class="md:w-1/2 p-4 flex justify-center md:justify-start items-center">
            <div class="md:max-w-lg">
                <h1 class="mb-4 font-heading text-3xl md:text-4xl font-medium">
                    Hi, ich bin Stefan.
                </h1>
                <p class="text-justify">
                    Hauptberuflich bin ich Soft­ware­ent­wick­ler, aber in den letzten
                    Jahren hat die Fotografie einen immer größer werdenden Stellenwert
                    in meinem Leben eingenommen. Und neben all den tollen Menschen, die
                    ich dadurch bereits kennenlernen durfte, schaffen es mittlerweile
                    auch immer mehr Produkte vor meine Kamera.
                    <br />
                    <br />
                    Zur Fotografie gekommen bin ich vor mittlerweile gut 10 Jahren, als mir
                    mein Arzt aufgrund gesundheitlicher Probleme eine Kamera in die Hand
                    drückte. Er meinte, ich solle raus in die Natur und festhalten was mich
                    gerade so beschäftigt und interessiert.
                    <br />
                    Die Fotografie ist dadurch zu einer Art Ausgleich geworden. Deshalb ist
                    es für mich auch das schönste Gefühl, wenn ich bei einem Shooting sehe,
                    dass von dieser Positivität etwas auf die beteiligten Personen überspringt.
                    <br />
                    <br />
                    Inzwischen ist aus diesem anfänglich reinen Hobby ein kleiner Nebenberuf
                    geworden, den ich so auch genau so gerne weiter ausbauen möchte.
                    <br />
                    Ihr habt kreative Ideen und euch gefällt mein Stil? Dann möchte ich euch
                    in Zukunft gerne fotografisch unterstützen!
                </p>
            </div>
        </div>

    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="py-12">
    <div class="p-4 mx-auto max-w-screen-sm text-white">

        <h1 class="mb-2 font-heading font-medium text-4xl md:text-6xl text-center">
            Du hast Lust auf ein gemeinsames Projekt?
        </h1>

        <p class="mb-4 text-xl md:text-2xl text-center">
            Dann melde dich gerne bei mir.
        </p>

        <form action="#" id="contact-form" class="space-y-6">
            
            <div>
                <input type="email" id="contact-email" class="block w-full p-2 rounded-lg border border-zinc-600 bg-zinc-700 text-white placeholder-zinc-400" placeholder="Deine Email" required>
                <div id="contact-email-error" class="contact-feedback font-semibold text-red-500"></div>
            </div>

            <div class="sm:col-span-2">
                <textarea id="contact-message" rows="6" class="block w-full p-2.5 rounded-lg border border-zinc-600 bg-zinc-700 text-white placeholder-zinc-400" placeholder="Deine Nachricht..."  required></textarea>
                <div id="contact-message-error" class="contact-feedback font-semibold text-red-500"></div>
            </div>

            <div>
                <input type="checkbox" id="contact-privacy" required />
                <label for="contact-privacy">
                    <a href="impressum" target="_blank" class="underline hover:text-teal-500">Ich stimme der Datenschutzerklärung zu.</a> <span class="text-red-500">*</span>
                </label>
                <div id="contact-privacy-error" class="contact-feedback font-semibold text-red-500"></div>
            </div>

            <button type="submit" id="contact-send" class="py-3 px-8 rounded-md bg-teal-700 hover:bg-teal-900 text-white uppercase">
                Senden
            </button>

        </form>

  </div>   
</section>