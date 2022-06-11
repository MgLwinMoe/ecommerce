<div>
    <div class="container" style="padding-top: 30px;">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">Edit Product</div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.product')}}" class="btn btn-success pull-right">All Product</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(session()->has('success_message'))
                                <div class="alert alert-success">
                                    {{session()->get('success_message')}}
                                </div>
                            @endif
                            <form wire:submit.prevent='update' action="" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Product Name</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Product name" class="form-control input-md" wire:model='name' wire:keyup='generateSlug'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-md-4 control-label">Product Slug</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Product slug" class="form-control input-md" wire:model='slug'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="short_des" class="col-md-4 control-label">Short Description</label>
                                    <div class="col-md-4">
                                        <textarea placeholder="Short Description" name="short_description" class="form-control" wire:model='short_des'></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="des" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-4">
                                        <textarea name="description" placeholder="Description" class="form-control" wire:model='des'></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="regular_price" class="col-md-4 control-label">Regular Price</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Regular Price" name="regular_price" class="form-control" wire:model='regular_price'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sale_price" class="col-md-4 control-label">Sale Price</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Sale Pirce" name="sale_price" class="form-control" wire:model='sale_price' />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stock" class="col-md-4 control-label">Stock</label>
                                    <div class="col-md-4">
                                        <select name="stock" class="form-control" wire:model='stock'>
                                            <option value="instock">Instock</option>
                                            <option value="outofstock">Outofstock</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="featured" class="col-md-4 control-label">Faetured</label>
                                    <div class="col-md-4">
                                        <select name="" class="form-control" wire:model='featured'>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quantity" class="col-md-4 control-label">Quantity</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Quantity" name="quantity" class="form-control" wire:model='qty' />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-md-4 control-label">Product Image</label>
                                    <div class="col-md-4">
                                        <input type="file" name="product_image" class="form-control" wire:model='newImage' />
                                        @if ($newImage)
                                            <img src="{{$newImage->temporaryUrl()}}" width="150">

                                        @else
                                            <img src="{{asset('assets/images/products')}}/{{$image}}" width="150" />
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category" class="col-md-4 control-label">Category</label>
                                    <div class="col-md-4">
                                        <select name="category" class="form-control" wire:model='category_id'>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <input type="submit" value="Update" class=" btn btn-info">
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


