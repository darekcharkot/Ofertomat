<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'address' => 'required',
            'nip' => 'required',
        ]);

        $company = new Company();
        $company->name = $validated['name'];
        $company->address = $validated['address'];
        $company->nip = $validated['nip'];
        $company->save();

        $request->session()->flash('success', 'Dodano nową firmę');
        // ::flash('success','Dodano nową firmę');
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
