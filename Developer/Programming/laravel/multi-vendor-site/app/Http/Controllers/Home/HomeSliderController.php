<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;

class HomeSliderController extends Controller
{
    //

    public function homeSlider(){

        $homeslide = HomeSlide::find('1');
        return view('admin.home_slide.home_slide_all', compact('homeslide'));
    }

    public function updateSlider(Request $request){

        $slide_id = $request->id;

        if( $request->file('slider_image')){
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_gen);
            $save_url = 'upload/home_slide/'.$name_gen;


            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url
            ]);

$notification = array(
    'message' => 'Home Slide updated with Image successfully',
    'alert-type' => 'success'
);

return redirect()->back()->with($notification);

        } else {

                HomeSlide::findOrFail($slide_id)->update([
                    'title' => $request->title,
                    'short_title' => $request->short_title,
                    'video_url' => $request->video_url,
                    
                ]);

                $notification = array(
                    'message' => 'Home Slide updated without Image successfully',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
        } // end else
    }
}
