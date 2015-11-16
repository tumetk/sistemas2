<?php
namespace App\Http\Controllers\Front;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Faker\Factory as Faker;

class CotizarController extends Controller
{
    public function cotizarServices()
    {

        $dummy= [
            'try' => 'data1',
            'try2' =>'data2'
        ];

        return response()->json($dummy);
    }
}
