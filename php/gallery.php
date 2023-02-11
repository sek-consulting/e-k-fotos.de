<?php

require_once "tag.php";

class Gallery {

    private $images;

    private function __construct() {
        $images = [];
    }

    public static function init() {
        return new Gallery();
    }

    public function from_path($path) {

        $files = [];
        if ($handle = opendir($path)) {
            while($files[] = readdir($handle)); // read all files into array
            sort($files);
            closedir($handle);
        }
        foreach ($files as $entry) {
            if (strlen($entry) <= 2) continue;
            
            $full_path = "{$path}/{$entry}";
            if (is_dir($full_path)) continue;

            [$width, $height] = getimagesize($full_path);
            $full_image = new Image($full_path, $width, $height);

            $thumb_path = "{$path}/thumbs/{$entry}";
            if (file_exists($thumb_path)) {
                [$width, $height] = getimagesize($thumb_path);
                $thumb_image = new Image($thumb_path, $width, $height);
                $full_image->add_thumb($thumb_image);
            }

            $this->images[] = $full_image;
        }
        return $this;
    }

    public function from_path_shuffled($path) {
        $this->from_path($path);
        shuffle($this->images);
        return $this;
    }

    public function build() {
        $tag = new Tag();

        $items = [];
        foreach($this->images as $_image) {
            $image = ($_image->thumb !== false) ? $_image->thumb : $_image;

            $items[] = 
                $tag->div("class='grid-item'", "data-height='{$image->height}'", "data-width='{$image->width}'",
                    $tag->a("href='{$_image->path}'", "data-fslightbox='gallery'",
                        $tag->img("src='{$image->path}'")
                    )
                );
    
        }
        return $tag->div("class='grid-container'", implode($items));
    }

}

class Image {
    public $path;
    public $width;
    public $height;
    public $thumb = false;

    public function __construct($path, $width, $height) {
        $this->path   = $path;
        $this->width  = $width;
        $this->height = $height;
    }

    public function add_thumb(Image $thumb) {
        $this->thumb = $thumb;
    }
}