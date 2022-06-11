<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">All Sliders</div>
                                <div class="col-md-6">
                                    <a href="{{route('admin.addslider')}}" class="btn btn-success pull-right">Add New Slider</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Price</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{$slider->id}}</td>
                                            <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="60"/></td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->subtitle}}</td>
                                            <td>{{$slider->price}}</td>
                                            <td>{{$slider->link}}</td>
                                            <td>{{$slider->status}}</td>
                                            <td>{{$slider->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.editslider',['slider_id' => $slider->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                                <a href="#" wire:click.prevent='destroy({{$slider->id}})' style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

