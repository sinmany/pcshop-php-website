<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GetComputer;

class GetComputerController extends Controller
{

    protected $computer;

    public function __construct()
    {
        $this->computer = new GetComputer();
    }

    public function getcomputer()
    {
        $response['computer'] = $this->computer->all();
        return view('frontend.getcomputer')->with($response);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:computer,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $this->computer->create($validatedData);

        return redirect()->route('computer.getcomputer')->with('success', 'Computer created successfully');
    }

    public function computerdetails($id)
    {
        $computer = GetComputer::findOrFail($id);
        return view('frontend.computerdetails', compact('computer'));
    }
}
