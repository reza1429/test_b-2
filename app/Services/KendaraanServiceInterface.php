<?php

namespace App\Services;

interface KendaraanServiceInterface
{
    public function getStokKendaraan();

    public function getPenjualanKendaraan();
    public function getBeliMotor($id);
    public function getBeliMobil($id);
}
