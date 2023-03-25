<?php

namespace App\Http\Controllers;

use App\Models\Puzzles;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PuzzlesHandel extends Controller
{
    //

    public $categoryTitle;
    public $collection;


    public function categoryHandel($category)
    {

        $arr = [];
        foreach($this->collection as $item)
        {
            $arr [] += $item->id;   
        }
        $rundom = rand(0, $this->collection->count() -1);
        $full_Fen = Puzzles::all()->where('id',$arr[$rundom]);

        foreach($full_Fen as $categoryName){
            $type = $categoryName->category;
        }

        switch($type)
        {
            case 'one':
                $this->categoryTitle = 'Mate in one';
                break;
            case 'two':
                $this->categoryTitle = 'Mate in two';
                break;
            case 'three':
                $this->categoryTitle = 'Mate in three';
                break;
            case 'four':
                $this->categoryTitle = 'Mate in four';
                break;
            case 'five':
                $this->categoryTitle = 'Mate in five';
                break;
            case 'six':
                $this->categoryTitle = 'Mate in six';
                break;
            case 'best':
                $this->categoryTitle = 'Find best move';
                break;
        }
        $title = $this->categoryTitle;
        return view('puzzles.puzzle', compact('full_Fen', 'title'));
    }

    public function getCollection($category)
    {
        if($category === 'rundom') 
        {
            $collection = Puzzles::all()
            ->where('is_active', 1);
            
        }else{
            
            $collection = Puzzles::all()
            ->where('category', $category)
            ->where('is_active', 1);
        }
        $this->collection = $collection;
        return $this->categoryHandel($category);
    }    

    public function mate_in_one()
    {
        $category = 'one';
        return $this->getCollection($category);
    }

    public function mate_in_two()
    {
        $category = 'two';
        return $this->getCollection($category);
    }

    public function mate_in_three()
    {
        $category = 'three';
        return $this->getCollection($category);
    }

    public function mate_in_four()
    {
        $category = 'four';
        return $this->getCollection($category);
    }

    public function mate_in_five()
    {
        $category = 'five';
        return $this->getCollection($category);
    }

    public function mate_in_six()
    {
        $category = 'six';
        return $this->getCollection($category);
    }

    public function best_move()
    {
        $category = 'best';
        return $this->getCollection($category);
    }

    public function rundom_puzzle()
    {
        $category = 'rundom';        
        return $this->getCollection($category);
    }


}
