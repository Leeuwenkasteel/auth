<?php

namespace Leeuwenkasteel\Auth\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Leeuwenkasteel\Auth\Models\Terms;
use Illuminate\Support\Str;
use DB;


class TermsController extends Controller
{  
    public function __construct(){
        $this->middleware('permission:terms.index',   ['only' => ['index']]);
        $this->middleware('permission:terms.create',   ['only' => ['create', 'store']]);
        $this->middleware('permission:terms.show',   ['only' => ['show']]);
        $this->middleware('permission:terms.edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:terms.destroy',   ['only' => ['destroy']]);
    }

    public function index(){
        $term = Terms::where('date', '<=', date('Y-m-d'))->orderBy('date', 'desc')->get()->first();
        return view('auth::terms.index', compact('term'));
    }

    public function create(){
        $term = Terms::orderBy('date', 'desc')->get()->first();
        $date  = (!empty($term) ? $term->date->forma('Y-m-d') : date('Y-m-d'));
            
        return view('auth::terms.create', compact('date'));
    }

    public function store(Request $req){
        $term = new Terms($req->all());
        $term->save();
        return redirect()->route('terms.index')->with('success',trans('auth::messages.terms_saved'));
    }

}