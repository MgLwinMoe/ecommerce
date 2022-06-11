<div>
    <div class="container" style="padding-top: 30px;">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">Edit Category</div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.categories')}}" class="btn btn-success pull-right">All Categories</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(session()->has('success_message'))
                                <div class="alert alert-success">
                                    {{session()->get('success_message')}}
                                </div>
                            @endif
                            <form wire:submit.prevent='updateCategory' action="" class="form-horizontal">
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Category Name</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Category name" class="form-control input-md" wire:model="name" wire:keyup='generateSlug'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-md-4 control-label">Category Slug</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Category slug" class="form-control input-md" wire:model="slug">
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
