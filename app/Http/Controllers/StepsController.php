<?php

namespace STEP\Http\Controllers;

use Illuminate\Http\Request;
use STEP\Category;
use STEP\Step;
use STEP\Kostep;
use STEP\User;
use STEP\Join;
use STEP\Complete;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class StepsController extends Controller
{
  // TOPページ
  // =======================================
  public function index() {
    if (Auth::check()) {
      return redirect('/all');
    }
    $categories = Category::all();
    return view('steps.index', ['categories' => $categories]);
  }


  // Allページ
  // =======================================
  public function all() {
    $categories = Category::all();
    return view('steps.all', ['categories' => $categories]);
  }


  // STEP一覧ページ
  // =======================================
  public function arichive() {
    // $steps = Step::with('user')->with('category')->orderBy(Step::CREATED_AT, 'desc')->get();
    // return view('steps.archive', ['steps' => $steps]);
    $categories = Category::all();
    return view('steps.archive', ['categories' => $categories]);
  }


  // STEP一覧ページ（カテゴリー別）
  // =======================================
  public function category($category_id) {
    // $steps = Step::where('category_id', $category_id)->with('user')->with('category')->orderBy(Step::CREATED_AT, 'desc')->get();
    // return view('steps.archive', ['steps' => $steps]);
    $categories = Category::all();
    return view('steps.category', ['categoryid' => $category_id, 'categories' => $categories]);
  }


  // STEP流れページ
  // =======================================
  public function flow($stepid) {
    $categories = Category::all();
    $kostepcount = Kostep::where('step_id', $stepid)->count();
    if (Auth::check()) {
      $finishcount = Complete::where('user_id', Auth::user()->id)->where('step_id', $stepid)->count();
    }else{
      $finishcount = 0;
    }
    
    if($finishcount === 0){
      $complete = 0;
    }else{
      $complete = ($finishcount / $kostepcount) * 100;
    }
    return view('steps.flow', ['stepid' => $stepid, 'categories' => $categories, 'complete' => $complete]);
  }


  // STEP詳細ページ
  // =======================================
  public function detail($stepid, $flowid) {
    $joined = Join::where('step_id', $stepid)->where('user_id', Auth::user()->id)->count();
    
    //初めて該当のSTEPに参加する場合のみjoin登録する
    if(!$joined){
      $join = new Join;
      $join->step_id = $stepid;
      $join->user_id = Auth::user()->id;
      $join->save();
    }
    $title = Step::find($stepid);
    $categories = Category::all();
    return view('steps.detail', ['stepid' => $stepid, 'flowid' => $flowid, 'title' => $title, 'categories' => $categories]);
  }

  // STEP編集ページ
  // =======================================
  public function edit($stepid){
    $step = Step::find($stepid);
    $this->authorize('edit', $step);
    $categories = Category::all();
    return view('steps.edit',  ['stepid' => $stepid, 'categories' => $categories]);
  
  }

  // STEP新規登録ページ
  // =======================================
  public function new(){
    $categories = Category::all();
    return view('steps.new',  ['categories' => $categories]);
  }
}
