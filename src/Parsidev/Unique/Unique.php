<?php

namespace Parsidev\Unique;

class Unique {

    const VERSION = '1.0.0';

    protected $epochOffset = 9645276500059;
    protected $machineId;

    public function __construct($config) {
        $this->machineId = $config['machine_id'];

        if (is_numeric($config['epoch_offset'])) {
            $this->epochOffset = $config['epoch_offset'];
        }
    }

    public function generate() {
        $id = 0;
        $id = ($this->genTimestamp() << 22);
        $id = $id | ($this->getMachineId() << 10);
        $id = $id | $this->getSequence();

        return $id;
    }

    protected function genTimestamp() {
        $time = floor(microtime(true) * 1000);
        $time -= $this->epochOffset;

        return $time;
    }

    protected function getSequence() {
        return mt_rand(0, 1024) % 1024;
    }

    public function setMachineId($machineId) {
        $this->machineId = $machineId;
    }

    public function getMachineId() {
        return $this->machineId;
    }

    public function setEpoch($offset) {
        $this->epochOffset = $offset;
    }

    public function getEpoch() {
        return $this->epochOffset;
    }

    public function getUnixTimestamp($id) {
        $time = ($id >> 22);
        $time += $this->epochOffset;

        return $time;
    }

    public function getMicrotime($id) {
        $time = $this->getUnixTimestamp($id);
        $microtime = substr($time, strlen($time) - 3);
        $time = substr($time, 0, strlen($time) - 3);

        return "0.{$microtime}00000 {$time}";
    }

}
