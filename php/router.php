<?php

class Router {

    public $php_file;
    public $js_file;

    public function __construct() {
        $this->php_file = false;
        $this->js_file  = false;
    }

    public function parse($call): bool {

        // ../pages/call.{php|js}

        if (($this->php_file = $this->check_file($this->get_file_type($call, "php"))) !== false) {
            $this->js_file = $this->check_file($this->get_file_type($call, "js"));
            return true;
        }

        // ../pages/call/index.{php|js}

        if (($this->php_file = $this->check_file($this->get_folder_type($call, "php"))) !== false) {
            $this->js_file = $this->check_file($this->get_folder_type($call, "js"));
            return true;
        }

        return false;
    }

    private function get_file_type($call, $ext) {
        return "pages/{$call}.{$ext}";
    }

    private function get_folder_type($call, $ext) {
        return "pages/{$call}/index.{$ext}";
    }

    private function check_file($path) {
        if (file_exists($path)) {
            return $path;
        }
        return false;
    }

}