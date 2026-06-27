<?php

namespace App\Http\Controllers;

use App\Http\Integrations\Razorpay\RazorpayConnector;
use Exception;
use Illuminate\Http\Request;
use Session;

class RazorpayController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(private RazorpayConnector $razorpayConnector)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('razorpay');
    }
  
    /**
     * Store a newly created resource in storage.
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
