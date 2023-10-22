<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider as ModelsSlider;
use App\SliderNamespace\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;



class SliderAdminController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(ModelsSlider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try{
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, fieldName: 'image_path', foderName: 'slider');
            if (!empty($dataImageSlider)) {
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');
        }catch(\Exception $exception){
            Log::error("Lỗi: " .$exception->getMessage() .'---Line:'. $exception ->getLine());
        }

    }
}
