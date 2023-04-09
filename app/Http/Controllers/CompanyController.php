<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Puzzles;
use App\Traits\MyPuzzles;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use MyPuzzles;


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


    public function add_puzzles_mate_in_one()
    {
        
        
        for($i = 0; $i < count($this->mateInOne()); $i++)
        {
            $addPuzzle = new Puzzles;
            $pos = strpos($this->mateInOne()[$i],' ');
            $fen = substr($this->mateInOne()[$i],0,$pos);
            $color = $this->mateInOne()[$i][$pos+1];
            $castling_rights = substr($this->mateInOne()[$i],$pos+3, 3);
            $num_moves = substr($this->mateInOne()[$i],$pos+6);

                $addPuzzle->category = 'one';
                $addPuzzle->plain_fen = $fen;
                $addPuzzle->color = $color;
                $addPuzzle->castling_rights = $castling_rights; 
                $addPuzzle->num_moves = $num_moves;
                $addPuzzle->solution = "";
                $addPuzzle->is_active = 1 ;
                $addPuzzle->save();
        }
        
        return redirect()->back()->with('success', 'The puzzles has been added in database');
       

    }
    public function add_puzzles_mate_in_two()
    {
        
        
        for($i = 0; $i < count($this->mateIntwo()); $i++)
        {
            $addPuzzle = new Puzzles;
            $pos = strpos($this->mateIntwo()[$i],' ');
            $fen = substr($this->mateIntwo()[$i],0,$pos);
            $color = $this->mateIntwo()[$i][$pos+1];
            $castling_rights = substr($this->mateIntwo()[$i],$pos+3, 3);
            $num_moves = substr($this->mateIntwo()[$i],$pos+6);

                $addPuzzle->category = 'two';
                $addPuzzle->plain_fen = $fen;
                $addPuzzle->color = $color;
                $addPuzzle->castling_rights = $castling_rights; 
                $addPuzzle->num_moves = $num_moves;
                $addPuzzle->solution = "";
                $addPuzzle->is_active = 1 ;
                $addPuzzle->save();
        }
        
        return redirect()->back()->with('success', 'The puzzles has been added in database');
       

    }
}
