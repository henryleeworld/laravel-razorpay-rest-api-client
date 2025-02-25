<?php

namespace App\Http\Controllers;

use App\Http\Integrations\Razorpay\RazorpayConnector;
use Exception;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;

class RazorpayController extends Controller
{
    private $razorpayConnector;

    /**
     * Create a new controller instance.
     */
    public function __construct(RazorpayConnector $razorpayConnector)
    {
        $this->razorpayConnector = $razorpayConnector;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('razorpay');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
        try {
            $response = $this->razorpayConnector->fetch($input);
        } catch (Exception $e) {
            return  $e->getMessage();
            Session::put('error',$e->getMessage());
            return redirect()->back();
        }
        !$response ? Session::put('error', __('Payment Failed')) : Session::put('success', __('Payment successfully'));
        return redirect()->back();
    }
}
