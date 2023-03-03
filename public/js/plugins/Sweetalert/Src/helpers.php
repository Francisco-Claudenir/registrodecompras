<?php

if (! function_exists('alert')) {
    /**
     * Arrange for an alert message.
     *
     * @param string|null $message
     * @param string      $title
     *
     * @return \Plugins\SweetAlert\SweetAlertNotifier
     */
    function alert($message = null, $title = '')
    {
        $notifier = app('sweetalert');

        if (! is_null($message)) {
            return $notifier->message($message, $title);
        }

        return $notifier;
    }
}

if (! function_exists('sweetalert_js')) {
    /**
     * @param  string  $version
     * @param  string  $src
     * @return string
     */
    function sweetalert_js(string $src = null): string
    {
        if (null === $src) {
            $src = asset('vendor/sweetalert2/dist/sweetalert2.min.js');
        }

        return '<script type="text/javascript" src="'.$src.'"></script>';
    }
}

if (! function_exists('sweetalert_css')) {
    /**
     * @param  string  $version
     * @param  string  $href
     * @return string
     */
    function sweetalert_css(string $href = null): string
    {
        if (null === $href) {
            $href = asset('vendor/sweetalert2/dist/sweetalert2.min.css');
        }

        return '<link rel="stylesheet" type="text/css" href="'.$href.'">';
    }
}

if (! function_exists('jquery')) {
    /**
     * @param  string  $version
     * @param  string  $src
     * @return string
     */
    function jquery(string $src = null): string
    {
        if (null === $src) {
            $src = asset('vendor/jquery/jquery.min.js');
        }

        return '<script type="text/javascript" src="'.$src.'"></script>';
    }
}
