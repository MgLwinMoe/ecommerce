<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\HomeSlider;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $sub_title;
    public $price;
    public $link;
    public $image;
    public $status;


    public function mount()
    {
        $this->status = 0;
    }

    public function addSlider()
    {
        $slider = new HomeSlider();

        $slider->title = $this->title;
        $slider->subtitle = $this->sub_title;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imageName = Carbon::now()->timestamp. '_' .$this->image->extension();
        $this->image->storeAs('sliders', $imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('success_message', 'Home Slider has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
