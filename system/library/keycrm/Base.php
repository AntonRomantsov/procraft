<?php

namespace KeyCRM;

/**
 * Class Base
 *
 * @property \Loader load
 * @property \DB db
 * @property \Config config
 * @property \Language language
 */
abstract class Base {
    protected $registry;

    public function __construct(\Registry $registry) {
        $this->registry = $registry;
    }

    public function __get($name) {
        return $this->registry->get($name);
    }

    public function loadModel($name) {
        if ($loader = $this->registry->get('load')) {
            $loader->model($name);
        }

        $key = 'model_' . str_replace('/', '_', $name);
        if ($model = $this->registry->get($key)) {
            return $model;
        }

        return null;
    }
}
