@extends('templates')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12">
      <div class="card custom-card">
        <div class="card-header">
          <button class="card-title btn" style="float: left;">Create Products</button>
          <select class="select_count_image custom-select">
            <option value="1" selected>Image Uploads 1</option>
            <option value="2">Image Uploads 2</option>
            <option value="3">Image Uploads 3</option>
            <option value="4">Image Uploads 4</option>
            <option value="5">Image Uploads 5</option>
            <option value="6">Image Uploads 6</option>
            <option value="7">Image Uploads 7</option>
            <option value="8">Image Uploads 8</option>
            <option value="9">Image Uploads 9</option>
            <option value="10">Image Uploads 10</option>
          </select>
          <button class="btn btn-warning" id="openStorage" style="float: right;">My Storage</button>
        </div>
        <div class="card-body">
          <div class="card-block">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Tab 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Tab 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Tab 3</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false">Tab 4</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#tab5" aria-expanded="false">Tab 5</a>
              </li>
            </ul>
            <div class="tab-content px-1 pt-1">
              <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                <form id="uploadproduct" enctype="multipart/form-data">@csrf
                  <div class="form-row">
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                    <input type="hidden" name="img1" value="test"><input type="hidden" name="img2"><input type="hidden" name="img3"><input type="hidden" name="img4">
                    <input type="hidden" name="img5"><input type="hidden" name="img6"><input type="hidden" name="img7"><input type="hidden" name="img8">
                    <input type="hidden" name="img9"><input type="hidden" name="img10">
                    <div class="form-group col-md-6 p-0">
                      <label class="col-form-label">Name Products</label>
                      <input type="text" name="product_name" class="form-control"  placeholder="Type name products" maxlength="36">
                    </div>
                    <div class="form-group col-md-6 p-0">
                      <label class="col-form-label" >Price</label>
                      <input type="number" name="price" class="form-control"  placeholder="Type price in rupiah">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Description Products</label>
                    <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
                  </div>
                  <div class="col-xl-12 p-0">
                    <div class="col-xl-4 p-0">
                      <input type="number" placeholder="My Profits" name="profits" class="form-control mt-1 col-xl-4 col-lg-4 col-md-4 col-xs-3">
                    </div>
                    <div class="col-xl-4 p-0">
                      <input type="number" placeholder="Discount" name="discount" class="form-control mt-1 col-xl-4 xl-lg-4 col-md-4 col-xs-3">
                    </div>
                    <div class="col-xl-4 p-0">
                      <select name="conditions" class="custom-select mt-1 col-xl-12 -col-lg-12 col-md-12 col-xs-12">
                        <option value="1">New</option>
                        <option value="2">Second</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4 mt-1" style="padding: 0;">
                      <label for="inputState">Status Products :</label>
                      <select name="status" class="form-control">
                        <option value="public" selected>Public</option>
                        <option value="draft">Draft</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 mt-1" style="padding: 0;">
                      <label>Remaining Products</label>
                      <input type="number" name="remaining_products" class="form-control">
                    </div>
                    <div class="form-group col-md-4 mt-1" style="padding: 0;">
                      <label>Category Products :</label>
                      <select name="category_products" class="form-control" id="categoryselect">
                        @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>@endforeach
                      </select>
                    </div>
                  </div>
                  
                    <div style="display: table-row;position: absolute;top: 550px;background: white;width: 100%;padding: 20px;left: 0;">
                        <div class="input-image col-md-3">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img1">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img2" style="display: none;" accept="image/*">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img3" style="display: none;" accept="image/*">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img4" style="display: none;" accept="image/*">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img5" style="display: none;" accept="image/*">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img6" style="display: none;" accept="image/*">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img7" style="display: none;" accept="image/*">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img8" style="display: none;" accept="image/*">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img9" style="display: none;" accept="image/*">
                            <input placeholder="Image" class="select-image form-control" type="text" name="img10" style="display: none;" accept="image/*">
                        </div>
                        <select id="series_type" class="custom-select"></select>
                    </div>
                  <input type="submit" class="btn btn-primary" value="Save" style="position: fixed;z-index: 999;right: 0;bottom: 0;">
                </form>
                </div><!--1-->
                <!-- <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                  <form method="post" action="{{route('admin.createproduct')}}" enctype="multipart/form-data">@csrf
                    <div class="form-row">
                      <input type="text" value="{{auth()->user()->id}}" name="user_id" style="display: none;">
                      <div class="form-group col-md-6">
                        <label class="col-form-label">Name Products</label>
                        <input type="text" name="img_for_two" class="form-control"  placeholder="Type name products" maxlength="36">
                      </div>
                      <div class="form-group col-md-6">
                        <label class="col-form-label" >Price</label>
                        <input type="number" name="price" class="form-control"  placeholder="Type price in rupiah">
                      </div>
                    </div>
                    <input type="file" name="mainimg" accept="image/*" required>
                    <input type="file" name="img2" accept="image/*" required>
                    <div class="form-group">
                      <label for="inputAddress">Description Products</label>
                      <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
                    </div>
                    <div class="col-xl-12 p-0">
                      <div class="col-xl-4 p-0">
                        <input type="number" name="profits" class="form-control mt-1 col-xl-4 col-lg-4 col-md-4 col-xs-3">
                      </div>
                      <div class="col-xl-4 p-0">
                        <input type="number" name="discount" class="form-control mt-1 col-xl-4 xl-lg-4 col-md-4 col-xs-3">
                      </div>
                      <div class="col-xl-4 p-0">
                        <select name="conditions" class="custom-select mt-1 col-xl-12 -col-lg-12 col-md-12 col-xs-12">
                          <option value="1">New</option>
                          <option value="2">Second</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputState">Status Products :</label>
                        <select name="status" class="form-control">
                          <option value="public" selected>Public</option>
                          <option value="draft">Draft</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Remaining Products</label>
                        <input type="number" name="remaining_products" class="form-control">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Category Products :</label>
                        <select name="category_products" class="form-control">
                          @foreach($category as $c)
                          <option value="{{$c->name}}" selected>{{$c->name}}</option>@endforeach
                        </select>
                        
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </form>
                  </div>2-->
                  <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                    <form method="post" action="{{route('admin.createproduct')}}" enctype="multipart/form-data">@csrf
                      <div class="form-row">
                        <input type="text" value="{{auth()->user()->id}}" name="user_id" style="display: none;">
                        <div class="form-group col-md-6">
                          <label class="col-form-label">Name Products</label>
                          <input type="text" name="img_for_three" class="form-control"  placeholder="Type name products" maxlength="36">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="col-form-label" >Price</label>
                          <input type="number" name="price" class="form-control"  placeholder="Type price in rupiah">
                        </div>
                      </div>
                      <input type="file" name="mainimg" accept="image/*" required>
                      <input type="file" name="img2" accept="image/*" required>
                      <input type="file" name="img3" accept="image/*" required>
                      <div class="form-group">
                        <label for="inputAddress">Description Products</label>
                        <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
                      </div>
                      <div class="col-xl-12 p-0">
                        <div class="col-xl-4 p-0">
                          <input type="number" name="profits" class="form-control mt-1 col-xl-4 col-lg-4 col-md-4 col-xs-3">
                        </div>
                        <div class="col-xl-4 p-0">
                          <input type="number" name="discount" class="form-control mt-1 col-xl-4 xl-lg-4 col-md-4 col-xs-3">
                        </div>
                        <div class="col-xl-4 p-0">
                          <select name="conditions" class="custom-select mt-1 col-xl-12 -col-lg-12 col-md-12 col-xs-12">
                            <option value="1">New</option>
                            <option value="2">Second</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputState">Status Products :</label>
                          <select name="status" class="form-control">
                            <option value="public" selected>Public</option>
                            <option value="draft">Draft</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label>Remaining Products</label>
                          <input type="number" name="remaining_products" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                          <label>Category Products :</label>
                          <select name="category_products" class="form-control">
                            @foreach($category as $c)
                            <option value="{{$c->name}}" selected>{{$c->name}}</option>@endforeach
                          </select>
                          
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                    </div><!--3-->
                    <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
                      <form method="post" action="{{route('admin.createproduct')}}" enctype="multipart/form-data">@csrf
                        <div class="form-row">
                          <input type="text" value="{{auth()->user()->id}}" name="user_id" style="display: none;">
                          <div class="form-group col-md-6">
                            <label class="col-form-label">Name Products</label>
                            <input type="text" name="img_for_fourth" class="form-control"  placeholder="Type name products" maxlength="36">
                          </div>
                          <div class="form-group col-md-6">
                            <label class="col-form-label" >Price</label>
                            <input type="number" name="price" class="form-control"  placeholder="Type price in rupiah">
                          </div>
                        </div>
                        <input type="file" name="mainimg" accept="image/*" required>
                        <input type="file" name="img2" accept="image/*" required>
                        <input type="file" name="img3" accept="image/*" required>
                        <input type="file" name="img4" accept="image/*" required>
                        <div class="form-group">
                          <label for="inputAddress">Description Products</label>
                          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
                        </div>
                        <div class="col-xl-12 p-0">
                          <div class="col-xl-4 p-0">
                            <input type="number" name="profits" class="form-control mt-1 col-xl-4 col-lg-4 col-md-4 col-xs-3">
                          </div>
                          <div class="col-xl-4 p-0">
                            <input type="number" name="discount" class="form-control mt-1 col-xl-4 xl-lg-4 col-md-4 col-xs-3">
                          </div>
                          <div class="col-xl-4 p-0">
                            <select name="conditions" class="custom-select mt-1 col-xl-12 -col-lg-12 col-md-12 col-xs-12">
                              <option value="1">New</option>
                              <option value="2">Second</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="inputState">Status Products :</label>
                            <select name="status" class="form-control">
                              <option value="public" selected>Public</option>
                              <option value="draft">Draft</option>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label>Remaining Products</label>
                            <input type="number" name="remaining_products" class="form-control">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Category Products :</label>
                            <select name="category_products" class="form-control">
                              @foreach($category as $c)
                              <option value="{{$c->name}}" selected>{{$c->name}}</option>@endforeach
                            </select>
                            
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                      </form>
                      </div><!--4-->
                      <div class="tab-pane" id="tab5" aria-labelledby="base-tab5">
                        <form method="post" action="{{route('admin.createproduct')}}" enctype="multipart/form-data">@csrf
                          <div class="form-row">
                            <input type="text" value="{{auth()->user()->id}}" name="user_id" style="display: none;">
                            <div class="form-group col-md-6">
                              <label class="col-form-label">Name Products</label>
                              <input type="text" name="img_for_five" class="form-control"  placeholder="Type name products" maxlength="36">
                            </div>
                            <div class="form-group col-md-6">
                              <label class="col-form-label" >Price</label>
                              <input type="number" name="price" class="form-control"  placeholder="Type price in rupiah">
                            </div>
                          </div>
                          <input type="file" name="mainimg" accept="image/*" required>
                          <input type="file" name="img2" accept="image/*" required>
                          <input type="file" name="img3" accept="image/*" required>
                          <input type="file" name="img4" accept="image/*" required>
                          <input type="file" name="img5" accept="image/*" required>
                          <div class="form-group">
                            <label for="inputAddress">Description Products</label>
                            <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
                          </div>
                          <div class="col-xl-12 p-0">
                            <div class="col-xl-4 p-0">
                              <input type="number" name="profits" class="form-control mt-1 col-xl-4 col-lg-4 col-md-4 col-xs-3">
                            </div>
                            <div class="col-xl-4 p-0">
                              <input type="number" name="discount" class="form-control mt-1 col-xl-4 xl-lg-4 col-md-4 col-xs-3">
                            </div>
                            <div class="col-xl-4 p-0">
                              <select name="conditions" class="custom-select mt-1 col-xl-12 -col-lg-12 col-md-12 col-xs-12">
                                <option value="1">New</option>
                                <option value="2">Second</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="inputState">Status Products :</label>
                              <select name="status" class="form-control">
                                <option value="public" selected>Public</option>
                                <option value="draft">Draft</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4">
                              <label>Remaining Products</label>
                              <input type="number" name="remaining_products" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                              <label>Category Products :</label>
                              <select name="category_products" class="form-control">
                                @foreach($category as $c)
                                <option value="{{$c->name}}" selected>{{$c->name}}</option>@endforeach
                              </select>
                              
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                        </div><!--5-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>@endsection
@section('modal')
<div class="modal fade" id="storageModal" tabindex="-1" role="dialog" aria-labelledby="storageModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="storageModalTitle" style="float: left;">My Storage Image</h5>
        <button type="button" class="close" id="closeStorage">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="float: left;width: 100%;background:whitesmoke;
      border-left: 10px solid #cbdbd2;border-right: 10px solid #cbdbd2;
      border-bottom: 10px solid#cbdbd2;">
        <div id="bodyStorage" style="float: left;width: 100%;"></div>
        <?php
        /*$folder = storage_path('app/public/image');
        if($dir = opendir($folder))
        {
          while(($file = readdir($dir)) !== false)
          {
            if($file == '.' || $file == '..'){
              
            }
            else{
              echo "<div class='col-xl-3'>";
            echo "<img src='".url('storage/image/'.$file)."' width='100%' height='200px' data-img='".$file."'><p class='copy'>".$file."</p>";
            echo "<input name='datasorage' value='".$file."' type='hidden'>";
            echo "</div>";
            }
          }
          closedir($dir);
        }*/
        ?>
      </div>
      <div class="modal-footer" style="float: left;float: left;background:aquamarine;width: 100%;">
        <button type="button" class="btn btn-primary">Next</button>
        <div style="float:left;width: 50%;">
          <input type="file" name="image">
          <button type="button" class="btn btn-info">Upload</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#categoryselect').change(function(){
        var value = $(this).children('option:selected').val();
            $.get("{{url('admin/api-admin/get/category/merk/data')}}"+'/'+value, function(data) {
                for(var i in data)
                {
                     $('#series_type').append('<option value='+data[i].merk+'>'+data[i].merk+'<option>');
                }
            });
    });
    $('select.select_count_image').change(function(){
        var value = $(this).children('option:selected').val();
        if(value == '1')
        {
            $('input[name=img1]').css('display','block');
            $('input[name=img2]').css('display','none');
            $('input[name=img3]').css('display','none');
            $('input[name=img4]').css('display','none');
            $('input[name=img5]').css('display','none');
            $('input[name=img6]').css('display','none');
            $('input[name=img7]').css('display','none');
            $('input[name=img8]').css('display','none');
            $('input[name=img9]').css('display','none');
            $('input[name=img10]').css('display','none');
        }
        if(value == '2')
        {
            $('input[name=img2]').css('display','block');
            $('input[name=img3]').css('display','none');
            $('input[name=img4]').css('display','none');
            $('input[name=img5]').css('display','none');
            $('input[name=img6]').css('display','none');
            $('input[name=img7]').css('display','none');
            $('input[name=img8]').css('display','none');
            $('input[name=img9]').css('display','none');
            $('input[name=img10]').css('display','none');
        }
        else
        {
            if(value == '3')
            {
            $('input[name=img2]').css('display','block');
            $('input[name=img3]').css('display','block');
            $('input[name=img4]').css('display','none');
            $('input[name=img5]').css('display','none');
            $('input[name=img6]').css('display','none');
            $('input[name=img7]').css('display','none');
            $('input[name=img8]').css('display','none');
            $('input[name=img9]').css('display','none');
            $('input[name=img10]').css('display','none');
            }
            if(value == '4')
            {
            $('input[name=img2]').css('display','block');
            $('input[name=img3]').css('display','block');
            $('input[name=img4]').css('display','block');
            $('input[name=img5]').css('display','none');
            $('input[name=img6]').css('display','none');
            $('input[name=img7]').css('display','none');
            $('input[name=img8]').css('display','none');
            $('input[name=img9]').css('display','none');
            $('input[name=img10]').css('display','none');
            }
            if(value == '5')
            {
            $('input[name=img2]').css('display','block');
            $('input[name=img3]').css('display','block');
            $('input[name=img4]').css('display','block');
            $('input[name=img5]').css('display','block');
            $('input[name=img6]').css('display','none');
            $('input[name=img7]').css('display','none');
            $('input[name=img8]').css('display','none');
            $('input[name=img9]').css('display','none');
            $('input[name=img10]').css('display','none');
            }
            if(value == '6')
            {
            $('input[name=img2]').css('display','block');
            $('input[name=img3]').css('display','block');
            $('input[name=img4]').css('display','block');
            $('input[name=img5]').css('display','block');
            $('input[name=img6]').css('display','block');
            $('input[name=img7]').css('display','none');
            $('input[name=img8]').css('display','none');
            $('input[name=img9]').css('display','none');
            $('input[name=img10]').css('display','none');
            }
            if(value == '7')
            {
            $('input[name=img2]').css('display','block');
            $('input[name=img3]').css('display','block');
            $('input[name=img4]').css('display','block');
            $('input[name=img5]').css('display','block');
            $('input[name=img6]').css('display','block');
            $('input[name=img7]').css('display','block');
            $('input[name=img8]').css('display','none');
            $('input[name=img9]').css('display','none');
            $('input[name=img10]').css('display','none');
            }
            if(value == '8')
            {
            $('input[name=img2]').css('display','block');
            $('input[name=img3]').css('display','block');
            $('input[name=img4]').css('display','block');
            $('input[name=img5]').css('display','block');
            $('input[name=img6]').css('display','block');
            $('input[name=img7]').css('display','block');
            $('input[name=img8]').css('display','block');
            $('input[name=img9]').css('display','none');
            $('input[name=img10]').css('display','none');
            }
            if(value == '9')
            {
            $('input[name=img2]').css('display','block');
            $('input[name=img3]').css('display','block');
            $('input[name=img4]').css('display','block');
            $('input[name=img5]').css('display','block');
            $('input[name=img6]').css('display','block');
            $('input[name=img7]').css('display','block');
            $('input[name=img8]').css('display','block');
            $('input[name=img9]').css('display','block');
            $('input[name=img10]').css('display','none');
            }
            if(value == '10')
            {
            $('input[name=img2]').css('display','block');
            $('input[name=img3]').css('display','block');
            $('input[name=img4]').css('display','block');
            $('input[name=img5]').css('display','block');
            $('input[name=img6]').css('display','block');
            $('input[name=img7]').css('display','block');
            $('input[name=img8]').css('display','block');
            $('input[name=img9]').css('display','block');
            $('input[name=img10]').css('display','block');
            }
        }
    });
  $('.select-image').autocomplete({
    source: "{{url('admin/api-admin/get/file/image')}}",
    multiselect: true,
  });
  /*
  */
  $('#openStorage').click(function(){
    $('#storageModal').modal("show");
    if($('input[name=datasorage]').val('.') || $('input[name=datasorage]').val('..'))
    {
      $('input[name=datasorage]').remove();
    };
    $.get("{{route('admin.api.fileimage')}}", function(data) {
      cache:true;
      $.each(data.data, function(index, val) {
        if(val.image !== null){
          $('#bodyStorage').append("<div class='col-xl-3 myfile'>"+
          "<img class='choose-file' data-img='"+val.image+"' src='"+"{{url('storage/image')}}"+"/"+val.image+"' width='100%' height='200px'>"+
          "<p style='text-align: center;font-size: 13px;text-decoration: underline;'>"+val.image+"</p>"+
          "</div>"
        );
        }
        
      });
    });
  });

  /*$('.choose-file').on('click',function(){
    var img = $(this).data('img');
    if($('input[name=img1]').val() == null)
    {
      $('input[name=img1]').val(img);
      console.log(img);
    }
    else
    {
      if($('input[name=img2]').val() == null)
      {
      $('input[name=img2]').val(img);
      console.log(img);
      }
    }
  });*/
  /*$('#choosefile').click(function(){
    $('#storageModal').modal("show");
    if($('input[name=datasorage]').val('.') || $('input[name=datasorage]').val('..'))
    {
      $('input[name=datasorage]').remove();
    };
    $.get("{{route('admin.api.fileimage')}}", function(data) {
      $.each(data.data, function(index, val) {
        if(val.image !== null){
          $('#bodyStorage').append("<div class='col-xl-3 myfile'>"+
          "<img src='"+"{{url('storage/image')}}"+"/"+val.image+"' width='100%' height='200px'>"+
          "<p style='text-align: center;font-size: 13px;text-decoration: underline;'>"+val.image+"</p>"+
          "</div>"
        );
        }
        
      });
    });
  });*/
  $('#uploadproduct').on('submit',function(e){
    e.preventDefault();
    var data = $('#uploadproduct').serialize();
    $.ajax({
      url: "{{route('admin.createproduct')}}",
      type:'post',
      data:data,
      success:function(response)
      {
        console.log('code 200');
        $('#alertSuccess').css('display','block');
        $('#alertSuccessContent').html(response.success);
        $('#alertSuccess').fadeOut(10000);
      },
      error:function()
      {
        console.log(e);
      }
    });
  });
  $('#closeStorage').click(function(){
    $('#storageModal').modal("hide");
    $('.myfile').remove();
  })
  /*$('body').on('click','.copy',function(){
    var data = $(this).data('img');
    data.select();
    data.setSelectionRange(0,99999);
    document.execCommand("copy");
  });*/
});
</script>
@endsection