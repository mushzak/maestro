<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$gallery = Gallery::orderBy('id','desc')->get();
		$setting = Setting::find('1');
		return view('pages.home',compact('setting','gallery'));
	}
	public function about(){
		$setting = Setting::find('1');
		return view('pages.about')->with('setting',$setting);
	}
	public function contact(){
		$setting = Setting::find('1');
		return view('pages.contact')->with('setting',$setting);
	}
	public function gallery(Gallery $gallery){
		$gallery = Gallery::orderBy('id','desc')->get();
		return view('pages.gallery',compact('gallery'));
	}
	public function sendEmail(Request $request){
		$data = $request->all();
		$rules = [
			'name' =>'required',
			'subject'=>'required',
			'email' =>'required|email',
			'message'=>'required'
		];
		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			$messages = $validator->messages();
			return redirect()->back()->with(array('errors'=>$messages))->withInput();
		}
		$to      = 'maestroglendale@gmail.com';
		$subject = $data['subject'];
		$message = $data['message'];
		$headers = 'From:'.$data['email'] . "\r\n";
		mail($to, $subject, $message, $headers);
		return redirect('/');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
