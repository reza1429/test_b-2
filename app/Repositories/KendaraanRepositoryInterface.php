<?php

namespace App\Repositories;

interface KendaraanRepositoryInterface
{
    public function getStokKendaraan();

    public function getPenjualanKendaraan();
    public function getBeliMotor($id);
    public function getBeliMobil($id);
}
