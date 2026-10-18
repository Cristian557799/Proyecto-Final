<?php

declare(strict_types=1);

namespace Com\Daw2\Libraries;

class Permiso {
    public function __construct(
        private string $permiso
    ) {

    }

    public function canRead() {
        return str_contains($this->permiso, 'r');
    }

    public function canWrite() {
        return str_contains($this->permiso, 'w');
    }

    public function canDelete() {
        return str_contains($this->permiso, 'd');
    }
}