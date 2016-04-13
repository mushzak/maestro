<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
use App\Gallery;
use App\Setting;
use Intervention\Image\ImageManagerStatic as Image;
class AdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$gallery = Gallery::orderBy('id','desc')->get();
		return view('admin.home')->with('gallery',$gallery);
	}
	public function gallery(Gallery $gallery, Request $request){
		$date = $request->all();
		$rules = [
			'title' =>'required',
			'description' =>'required',
			'img_name' =>'required'
		];
		$validator = Validator::make($date,$rules);
		if($validator->fails()){
			$messages = $validator->messages();
			return redirect()->back()->with(array('errors'=>$messages))->withInput();
		}

		if(is_object($request->file('img_name'))){
			$file = $request->file('img_name');
			$filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
			$imgThumb = Image::make($file);
			$img = Image::make($file);
			$imgThumb->resize(null, 200, function ($constraint) {
				$constraint->aspectRatio();
			});
			$thumbPath = public_path('/images/gallery/tmb/').$filename;
			$imgPath = public_path('/images/gallery/').$filename;
			$date['img_name'] = $filename;
			$imgThumb->save($thumbPath);
			$img->save($imgPath);
		}
		$gallery = Gallery::insertgallery($date);
		if($gallery){
			return redirect('/admin');
		}
	}
	public function destroyGallery($id){
		$gallery = Gallery::find($id);
		if(!empty($gallery['img_name'])){
			$filename = public_path('images/gallery/tmb/').$gallery['img_name'];
			$filename2 = public_path('images/gallery/').$gallery['img_name'];
			if(File::exists($filename)){
				File::delete($filename);
				File::delete($filename2);
			}
		}
		$gallery->delete();
		return redirect('/admin');
	}
	public function editGallery($id)
	{
		$onegallery = Gallery::find($id);
		$gallerys = Gallery::orderBy('id','desc')->get();
		return view('admin.editGallery',compact('onegallery','gallerys'));
		dd($gallery);
	}
	public function updateGallery(Request $request)
	{
		$id = $request->input('id');
		$old_img = $request->input('old_img');
		$new_img = $request->input('img_name');
		$data = $request->all();
		unset($data['_token']);
		unset($data['old_img']);
		if(empty($data['img_name'])){
			$data['img_name'] = $old_img;
		}else{
			$filename = public_path('images/gallery/tmb/').$old_img;
			$filename2 = public_path('images/gallery/').$old_img;
			if(File::exists($filename)){
				File::delete($filename);
				File::delete($filename2);
			}
			$file = $request->file('img_name');
			$filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
			$imgThumb = Image::make($file);
			$img = Image::make($file);
			$imgThumb->resize(null, 200, function ($constraint) {
				$constraint->aspectRatio();
			});
			$thumbPath = public_path('/images/gallery/tmb/').$filename;
			$imgPath = public_path('/images/gallery/').$filename;
			$data['img_name'] = $filename;
			$imgThumb->save($thumbPath);
			$img->save($imgPath);
		}
		$gallery = Gallery::where(array('id'=>$id))->update($data);
		return redirect('/admin');
	}
	public function settings(){
		$setting = Setting::find('1');
		return view('admin.settings')->with('setting',$setting);
	}
	public function updateSettings(Request $request){
		$data = $request->all();
		unset($data['_token']);
		$setting = Setting::where(array('id'=>'1'))->update($data);
	 	return	redirect('admin/settings');
	}
}
