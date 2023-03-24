<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Puzzles;
use Illuminate\Http\Request;

class CompanyController extends Controller
{



    public function index()
    {
        $companies = Puzzles::orderby('id','desc')->paginate(5);
    return view('companies.index', ['companies' => $companies]);
    }

    function handel () {
        $items = Company::all()->where('id', 4);
        // dd($items);
        foreach($items as $item){
            $address = $item->address;
        }

    return view('puzzles.test');
    }

    function checkPos()
    {
        $items = Company::all()->where('id', 4);
        // foreach($items as $item){
        //     $posation = $item->address;
        // }

    return view('puzzles.mate_in_two', compact('items'));
    }

    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'address' => 'required',
        // ]);

        Puzzles::create($request->post());

        return redirect()->route('companies.index')->with('success','Company has been created successfully.');
    }

    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }
//
    public function edit(Company $company)
    {

        return view('companies.edit',compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $company->fill($request->post())->save();

        return redirect()->route('companies.index')->with('success','Company Has Been updated successfully');
    }
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully');
    }
}
