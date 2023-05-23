<?php

namespace App\Services;

use App\Repositories\KendaraanRepositoryInterface;

class KendaraanService implements KendaraanServiceInterface
{
    protected $kendaraanRepository;

    public function __construct(KendaraanRepositoryInterface $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function getStokKendaraan()
    {
        return $this->kendaraanRepository->getStokKendaraan();
    }

    public function getPenjualanKendaraan()
    {
        return $this->kendaraanRepository->getPenjualanKendaraan();
    }
    public function getBeliMotor($id)
    {
        return $this->kendaraanRepository->getBeliMotor($id);
    }
    public function getBeliMobil($id)
    {
        return $this->kendaraanRepository->getBeliMobil($id);
    }
}
