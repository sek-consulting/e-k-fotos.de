import { defineConfig } from "astro/config";

import sitemap from "@astrojs/sitemap";
import tailwind from "@astrojs/tailwind";
import vue from "@astrojs/vue";

export default defineConfig({
  site: "https://www.e-k-fotos.de",
  integrations: [sitemap(), tailwind(), vue()],
});
