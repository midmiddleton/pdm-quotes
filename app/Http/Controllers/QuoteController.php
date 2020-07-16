<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

/**
 * Quote Controller
 */
class QuoteController extends Controller
{

    protected $amlTripCost;
    protected $actualFuelCost;
    protected $totalCost;
    protected $quoteData;

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $quotes = Quote::all()->toArray();

        return view('quotes_list', ['quotes' => $quotes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('get-quote');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $quoteData = app('config')->get('quotes');
    
        $calculatedData = $this->calculateTotals(
            $quoteData,
            $request->only('total_mileage')
        );

        if($this->isMinimumCost($calculatedData['total_cost'])) {


            $calculatedData['total_cost'] = 50;
        }

        $quote = array_merge(
            $request->only(
            'name',
            'email',
            'phone',
            'total_mileage',
            'message',

            ), 
            $quoteData,
            $calculatedData
        );

        $quote = Quote::create($quote);

        return view('success', $quote);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        quote::destroy($quote);

        return Redirect::to('quotes/list');
    }

    /**
     * Caclulate the totals
     *
     * @param array $quoteData
     * @param array $mileage
     * @return array
     */
    private function calculateTotals(array $quoteData, array $mileage): array
    {
        $mileage = (
            $mileage['total_mileage'] * $quoteData['costs_per_mile']
        );
        $labour = $mileage + $quoteData['public_transport'];
  
        $var1 = $mileage / $quoteData['average_MPG'];
        $var2 = $var1 * 4;
        $actualFuelCost = $var2 * $quoteData['fuel_cost'];
       
        $totalCost = $labour + $actualFuelCost;

        return [
            'AML_trip_cost' => $labour,
            'actual_fuel_cost' => $actualFuelCost,
            'total_cost' => $totalCost 
        ];
    }

    private function isMinimumCost(string $cost): bool
    {
        if($cost <= 70) {
            return true;
        }
        return false;
    }
}
