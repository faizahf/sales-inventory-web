<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{

    public function create()
    {
        return view('customer.create', [
            'active' => 'Customer',
        ]);
    }

    public function store(Request $request)
    {
        $url = config('app.guzzle_url') . '/customers';
        $response = Http::post($url, [
            'name'    => $request->name,
            'domicile' => $request->domicile,
            'gender'  => $request->gender,
        ]);
        return redirect()->route('customer.show', [
            'response' => $response,
            'id_customer' => $response['customer']['id_customer'],
            'active' => 'Customer',
        ]);
    }

    public function edit($id_customer)
    {
        $url = config('app.guzzle_url') . '/customers/' . $id_customer;
        $customer = Http::get($url);

        return view('customer.edit', [
            'customer' => $customer['data'],
            'active' => 'Customer',
        ]);
    }

    public function update(Request $request, $id_customer)
    {
        $url = config('app.guzzle_url') . '/customers/' . $id_customer;
        $response = Http::patch($url, [
            'name'    => $request->name,
            'domicile' => $request->domicile,
            'gender'  => $request->gender,
        ]);
        return redirect()->route('customer.index', [
            'response' => $response,
            'active' => 'Customer',
        ]);
    }

    public function show($id_customer)
    {
        $url = config('app.guzzle_url') . '/customers/' . $id_customer;
        $customer = Http::get($url);

        return view('customer.show', [
            'customer' => $customer['data'],
            'active' => 'Customer',
        ]);
    }

    public function index()
    {
        $url = config('app.guzzle_url') . '/customers';
        $customers = Http::get($url);
        return view('customer.index', [
            'customers' => $customers,
            'active' => 'Customer',
        ]);
    }

    public function destroy($id_customer)
    {
        $url = config('app.guzzle_url') . '/customers/' . $id_customer;
        $delete = Http::delete($url);
        return redirect()->route('customer.index', [
            'delete' => $delete,
            'active' => 'Customer',
        ]);
    }
}