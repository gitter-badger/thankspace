<?php

class ImagesController extends BaseController {
	
	public function show($id)
	{
		$size = (!Input::has('size')) ? '' : Input::get('size') ;
		
		$_size = array(
			'200x'		=> array('width' => 200, 'height' => 200),
			'normal'	=> array('width' => 125, 'height' => 125),
			'medium'	=> array('width' => 100, 'height' => 100),
			'stream'	=> array('width' => 80,  'height' => 80),
			'feed'		=> array('width' => 60,  'height' => 60),
			'small'		=> array('width' => 40,  'height' => 40),
			'tiny'		=> array('width' => 20,  'height' => 20),
		);
		
		$key = public_path('img/'.$id.'.jpg');
		$get = ( file_exists($key) ? $key : public_path('img/nopic.png') );
		
		$img = Image::make(file_get_contents($get));
		
		if( Input::has('size') )
		{
			if ( $_size[$size] )
			{
				if ($_size[$size]['width'] == null ) {
					$img->heighten($_size[$size]['height']);
				} elseif ($_size[$size]['height'] == null ) {
					$img->widen($_size[$size]['width']);
				} else {
					$img->fit($_size[$size]['width'], $_size[$size]['height']);
				}
			}
		}
		
		$img->interlace();
		
		return Response::make($img->encode('jpg'), 200, [ 'Content-Type' => 'image/jpg' ]);
	}
	
	public function store()
	{
		$results = [];
		$path = public_path('img');
		$files = Input::file('files');
		
		foreach ( $files as $file )
		{
			$name = time().'.jpg';
			
			// get image size ( width & height )
			$info = getimagesize($file);
			
			$image = Image::make($file);
			
			if( $info[0] > 1024 ) $image->widen(1024);
			
			$image->interlace()->save($path.'/'.$name, 75);
			
			OrderGallery::create([ 'order_id' => Input::get('id'), 'filename' => $name ]);
			
			// set our results to have our asset path
			$name = URL::route('img.show', time()).'?size=normal';
			$results[] = compact('name');
		}
		
		// return our results in a files object
		return [ 'files' => $results ];
	}
	
}