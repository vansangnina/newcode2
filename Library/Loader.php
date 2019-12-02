<?php

namespace  Library;

class loader
{
  private $loader;
  private $overlays = array();

  public function __construct(ClassLoader $loader, array $overlays)
  {
    $this->loader = $loader;
    $this->overlays = $overlays;
  }

  public function loadClass($class)
  {
    foreach ($this->overlays as $overlay) {
      $overlayed_class = "$overlay\\$class";

      if ($this->loader->loadClass($overlayed_class)) {
        class_alias($overlayed_class, $class);

        return true;
      }
    }
    return $this->loadClass($class);
  }
}