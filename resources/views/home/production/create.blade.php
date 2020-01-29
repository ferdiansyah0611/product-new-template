@extends('layouts.template')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10 mx-auto card custom-card">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-img1-tab" data-toggle="tab" href="#nav-img1" role="tab" aria-controls="nav-img1" aria-selected="true">IMG 1</a>
        <a class="nav-item nav-link" id="nav-img2-tab" data-toggle="tab" href="#nav-img2" role="tab" aria-controls="nav-img2" aria-selected="false">IMG 2</a>
        <a class="nav-item nav-link" id="nav-img3-tab" data-toggle="tab" href="#nav-img3" role="tab" aria-controls="nav-img3" aria-selected="false">IMG 3</a>
        <a class="nav-item nav-link" id="nav-img4-tab" data-toggle="tab" href="#nav-img4" role="tab" aria-controls="nav-img4" aria-selected="false">IMG 4</a>
        <a class="nav-item nav-link" id="nav-img5-tab" data-toggle="tab" href="#nav-img5" role="tab" aria-controls="nav-img5" aria-selected="false">IMG 5</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-img1" role="tabpanel" aria-labelledby="nav-img1-tab">
        <form method="post" action="{{route('production.store')}}" enctype="multipart/form-data">@csrf
        <div class="form-row">
          <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
          <div class="form-group col-md-6">
            <label class="col-form-label">Name Products</label>
            <input type="text" name="img_for_one" class="form-control"  placeholder="Type name products" maxlength="36">
          </div>
          <div class="form-group col-md-6">
            <label class="col-form-label" >Price</label>
            <input type="number" name="price" class="form-control"  placeholder="Type price in rupiah">
          </div>
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 1</span>
        </div>
        <div class="custom-file">
          <input type="file" name="mainimg" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
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
      </div><!--./1-->
      <div class="tab-pane fade" id="nav-img2" role="tabpanel" aria-labelledby="nav-img2-tab">
        <form method="post" action="{{route('production.store')}}" enctype="multipart/form-data">@csrf
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
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 1</span>
        </div>
        <div class="custom-file">
          <input type="file" name="mainimg" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 2</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img2" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
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
      </div><!--./2-->
      <div class="tab-pane fade" id="nav-img3" role="tabpanel" aria-labelledby="nav-img3-tab">
        <form method="post" action="{{route('production.store')}}" enctype="multipart/form-data">@csrf
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
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 1</span>
        </div>
        <div class="custom-file">
          <input type="file" name="mainimg" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 2</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img2" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 3</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img3" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
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
      </div><!--./3-->
      <div class="tab-pane fade" id="nav-img4" role="tabpanel" aria-labelledby="nav-img4-tab">
        <form method="post" action="{{route('production.store')}}" enctype="multipart/form-data">@csrf
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
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 1</span>
        </div>
        <div class="custom-file">
          <input type="file" name="mainimg" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 2</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img2" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 3</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img3" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 4</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img4" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
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
      </div><!--./4-->
      <div class="tab-pane fade" id="nav-img5" role="tabpanel" aria-labelledby="nav-img5-tab">
        <form method="post" action="{{route('production.store')}}" enctype="multipart/form-data">@csrf
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
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 1</span>
        </div>
        <div class="custom-file">
          <input type="file" name="mainimg" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 2</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img2" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 3</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img3" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 4</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img4" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon02">Pictures 5</span>
        </div>
        <div class="custom-file">
          <input type="file" name="img5" accept="image/*" class="custom-file-input" required>
          <label class="custom-file-label">Choose images file</label>
        </div>
      </div>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
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
      </div><!--./5-->
    </div>     
    </div>
    </div>
</div>
@endsection
