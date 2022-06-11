<div>
    <div class="container" style="padding-top: 30px;">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">Add New Product</div>
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
                            <form wire:submit.prevent='updateCategory' action="" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="category" class="col-md-4 control-label">Choose Categories</label>
                                    <div class="col-md-4" wire:ignore>
                                        <select name="category" class="form-control select_category" multiple="multiple" wire:model='select_categories'>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">No Of Product</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="No of product" class="form-control input-md" wire:model='noofproducts'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <input type="submit" value="Save" class=" btn btn-info">
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function (){
            $('.select_category').select2();
            $('.select_category').on('change', function(e) {
                var data = $('.select_category').select2("val");
                @this.set('select_categories', data);
            });

        });
    </script>
@endpush


