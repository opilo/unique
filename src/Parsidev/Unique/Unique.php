<?php

namespace Parsidev\Unique;

class Unique {

    public function generate() {
        $id = mt_rand(1, 999);
        $id = $id | $this->getSequence();
        return base_convert($id, 10, 8);
    }

    protected function getSequence() {
        return mt_rand(100, mt_getrandmax()) % 102495;
    }
}
