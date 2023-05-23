<?php

namespace App\Http\Controllers;

use App\helper\ApiFormatter;
use App\Services\KendaraanServiceInterface;
use App\Repositories\KendaraanRepositoryInterface;
use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    protected $kendaraanService;
    protected $kendaraanRepository;

    public function __construct(KendaraanServiceInterface $kendaraanService, KendaraanRepositoryInterface $kendaraanRepository)
    {
        $this->kendaraanService = $kendaraanService;
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function getStokKendaraan()
    {
        $stokKendaraan = $this->kendaraanService->getStokKendaraan();

        if($stokKendaraan) {
            return ApiFormatter::createApi(200, 'Success', $stokKendaraan);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function getPenjualanKendaraan()
    {
        $penjualanKendaraan = $this->kendaraanService->getPenjualanKendaraan();

        if($penjualanKendaraan) {
            return ApiFormatter::createApi(200, 'Success', $penjualanKendaraan);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function BeliMotor($id)
    {
        try {
            $beliMotor = $this->kendaraanService->getBeliMotor($id);

            if($beliMotor) {
                return ApiFormatter::createApi(200, 'Success', $beliMotor);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
        
    }
    public function BeliMobil($id)
    {
        try {
            $beliMobil = $this->kendaraanService->getBeliMobil($id);

            if($beliMobil) {
                return ApiFormatter::createApi(200, 'Success', $beliMobil);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function index()
    {
        $motor = Motor::where('status', 0)->with('kendaraan')->get();
        $mobil = Mobil::where('status', 0)->with('kendaraan')->get();
        
        return view('stok_kendaraan', compact('motor', 'mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function penjualan(){
        $motor = Motor::where('status', 1)->with('kendaraan')->orderBy('updated_at', 'asc')->get();
        $mobil = Mobil::where('status', 1)->with('kendaraan')->orderBy('updated_at', 'asc')->get();
        
        return view('penjualan_kendaraan', compact('motor', 'mobil'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatemotor(Request $request, $id)
    {
        $motor = Motor::find($id);
        $motor->status = 1;
        $motor->updated_at = Carbon::now()->translatedFormat('Y-m-d H:i:s');
        
        $motor->save();
        return redirect('penjualan');
        //
    }
    
    public function updatemobil(Request $request, $id)
    {
        $mobil = Mobil::find($id);
        $mobil->status = 1;
        $mobil->updated_at = Carbon::now()->translatedFormat('Y-m-d H:i:s');

        $mobil->save();
        return redirect('penjualan');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
