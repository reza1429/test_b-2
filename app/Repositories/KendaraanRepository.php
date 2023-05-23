<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;
use Carbon\Carbon;

class KendaraanRepository implements KendaraanRepositoryInterface
{
    protected $kendaraan;
    protected $motor;
    protected $mobil;

    public function __construct(Kendaraan $kendaraan, Motor $motor, Mobil $mobil)
    {
        $this->kendaraan = $kendaraan;
        $this->motor = $motor;
        $this->mobil = $mobil;
    }

    public function getStokKendaraan()
    {
        $motor = Motor::where('status', 0)->with('kendaraan')->get();
        $mobil = Mobil::where('status', 0)->with('kendaraan')->get();
        
        return [$mobil, $motor];
    }

    public function getBeliMotor($id){
        $motor = Motor::findOrFail($id);

        $motor->update([
            'status'=>1,
            'updated_at'=>Carbon::now()->translatedFormat('Y-m-d H:i:s')
        ]);

        $data = Motor::where('id', '=', $motor->id)->get();
        
        return $data;
    }
    public function getBeliMobil($id){
        $mobil = Mobil::findOrFail($id);

        $mobil->update([
            'status'=>1,
            'updated_at'=>Carbon::now()->translatedFormat('Y-m-d H:i:s')
        ]);

        $data = Mobil::where('id', '=', $mobil->id)->get();
        
        return $data;
    }
    
    public function getPenjualanKendaraan()
    {
        $motor = Motor::where('status', 1)->with('kendaraan')->orderBy('updated_at', 'asc')->get();
        $mobil = Mobil::where('status', 1)->with('kendaraan')->orderBy('updated_at', 'asc')->get();
        
        return [$mobil, $motor];
    }
}
