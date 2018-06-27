<?php

namespace App\Http\Controllers;

use App\IP;
use Illuminate\Http\Request;
use App\Http\Resources\IPResource;
use Illuminate\Support\Facades\DB;

class IPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  string $ip
     * @return IPResource
     */
    public function show(string $ip)
    {
        if(!empty($ip)){
            IPResource::withoutWrapping();
            $iplong = ip2long($ip);
            $data = DB::table('countries')
                ->where([
                    ['ip_to','>=', $iplong],
                    ['ip_from','<=', $iplong]
                ])->first();

            if ($data) {
                return array (
                    'ip' => $ip,
                    'country_code' => $data->country_code,
                    'country_name' => $data->country_name,
                    'region_name' => $data->region_name,
                    'city_name' => $data->city_name
                );
            }
        }
        return array (
            'ip' => $ip,
            'country_code' => '-',
            'country_name' => '-',
            'region_name' => '-',
            'city_name' => '-' 
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function edit(IP $iP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IP $iP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IP  $iP
     * @return \Illuminate\Http\Response
     */
    public function destroy(IP $iP)
    {
        //
    }
}
