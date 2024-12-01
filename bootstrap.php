<?php

use App\Listeners\GenerateSitemap;
use TightenCo\Jigsaw\Jigsaw;
use Illuminate\Support\Str;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */


$events->afterBuild(function (Jigsaw $jigsaw) {
  $jigsaw->getOutputPaths()
  ->filter(function ($path) {
      return Str::startsWith($path, '/docs/');
  })
  ->each(function ($path) use ($jigsaw) {
      // Jigsaw did not return relative path of the generated file
      // as noted in the docs. This may break in a future version.
      $file = $jigsaw->getDestinationPath() . $path . '/index.html';
      $contents = file_get_contents($file);

      $contents = preg_replace_callback('/<p>\^{3}(.+?)\^{3}<\/p>/s', function ($matches) {
          return '<div class="bg-blue-50 border-t-4 border-blue-500 rounded-b text-blue-700 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-blue-700 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div class="text-sm">' . trim($matches[1]) . '</div>
  </div>
</div>';
      }, $contents, -1, $found);
      if ($found) {
          file_put_contents($file, $contents);
      }
  });
});

$events->afterBuild(GenerateSitemap::class);
