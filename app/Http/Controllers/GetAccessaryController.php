<?php

namespace App\Http\Controllers;

use App\Models\GetAccessary;
use Illuminate\Http\Request;

class GetAccessaryController extends Controller
{
    protected $accessary;

    public function __construct()
    {
        $this->accessary = new GetAccessary();
    }

    public function getaccessary()
    {
        $response['accessary'] = $this->accessary->all();
        return view('frontend.getaccessary')->with($response);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:accessary,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $this->accessary->create($validatedData);

        return redirect()->route('accessary.getaccessary')->with('success', 'accessary created successfully');
    }

    public function accessarydetails($id)
    {
        $accessary = GetAccessary::findOrFail($id);
        return view('frontend.accessarydetails', compact('accessary'));
    }
}
