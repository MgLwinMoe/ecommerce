<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;
use Carbon\Carbon;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $sub_title;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newImage;
    public $slider_id;

    public function mount($slider_id)
    {
        $slider = HomeSlider::find($slider_id);

        $this->slider_id = $slider->id;
        $this->title = $slider->title;
        $this->sub_title = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
    }

    public function update()
    {
        $slider = HomeSlider::find($this->slider_id);
        $slider->id = $this->slider_id;
        $slider->title = $this->title;
        $slider->subtitle = $this->sub_title ;
        $slider->price = $this->price;
        $slider->link = $this->link;
        if($this->newImage)
        {
            $imageName = Carbon::now()->timestamp. '_' .$this->newImage->extension();
            $this->newImage->storeAs('sliders', $imageName);
            $slider->image = $imageName;
        }
        $this->status = $slider->status;
        $slider->save();
        session()->flash('success_message', 'Slider has been updated successfully!');
    }




    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
