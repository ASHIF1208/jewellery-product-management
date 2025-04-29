<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Image Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default image driver that will be used by
    | Intervention Image. You may choose either "gd" or "imagick", but
    | you may also specify your own driver if you prefer.
    |
    */

    'driver' => env('IMAGE_DRIVER', 'gd'),

    /*
    |--------------------------------------------------------------------------
    | Memory Limit
    |--------------------------------------------------------------------------
    |
    | This option sets the maximum amount of memory that can be used by
    | Intervention Image. You may increase this value if you are working
    | with large images.
    |
    */

    'memory_limit' => env('IMAGE_MEMORY_LIMIT', '256M'),

    /*
    |--------------------------------------------------------------------------
    | Default Quality
    |--------------------------------------------------------------------------
    |
    | This option sets the default quality that will be used when encoding
    | images. The quality must be an integer between 0 and 100.
    |
    */

    'quality' => (int) env('IMAGE_QUALITY', 90),
]; 