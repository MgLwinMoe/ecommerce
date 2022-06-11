<div>
    <div class="container" style="padding-top: 30px;">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">Sale Setting</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(session()->has('success_message'))
                                <div class="alert alert-success">
                                    {{session()->get('success_message')}}
                                </div>
                            @endif
                            <form wire:submit.prevent='updateSale' action="" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Status</label>
                                    <div class="col-md-4">
                                        <select name="status" id="status" class="form-control" wire:model='status'>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-md-4 control-label">Sale Date</label>
                                    <div class="col-md-4">
                                        <input type="text" id="sale-date" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md" wire:model='sale_date'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <button type="submit" class=" btn btn-info">Update</button>
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
            $(function(){
                $('#sale-date').datetimepicker({
                    format: 'Y-MM-DD h:m:s',
                })
                .on('dp.change', function(ev){
                    var data = $('#sale-date').val();
                    @this.set('sale_date', data);
                });
            });
        </script>
@endpush


