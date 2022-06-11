<div>
    <div class="container" style="padding-top: 30px;">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">Add New Slider</div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.slider')}}" class="btn btn-success pull-right">All Sliders</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(session()->has('success_message'))
                                <div class="alert alert-success">
                                    {{session()->get('success_message')}}
                                </div>
                            @endif
                            <form wire:submit.prevent='addSlider' action="" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Title</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Title" class="form-control input-md" wire:model='title'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-md-4 control-label">SubTitle</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="SubTitle" class="form-control input-md" wire:model='sub_title'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-md-4 control-label">Price</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Price" name="price" class="form-control" wire:model='price'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sale_price" class="col-md-4 control-label">Link</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="link" name="link" class="form-control" wire:model='link' />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-md-4 control-label">Image</label>
                                    <div class="col-md-4">
                                        <input type="file" name="product_image" class="form-control" wire:model='image' />
                                        @if ($image)
                                            <img src="{{$image->temporaryUrl()}}" width="150">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stock" class="col-md-4 control-label">Status</label>
                                    <div class="col-md-4">
                                        <select name="stock" class="form-control" wire:model='status'>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class=" btn btn-info">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


