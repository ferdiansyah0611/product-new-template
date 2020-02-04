@extends('templates')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12">
      <div class="card custom-card">
        <div class="card-header">
          <h4 class="card-title">Basic Tabs</h4>
        </div>
        <div class="card-body">
          <div class="card-block">
            <p>Takes the basic nav from above and adds the <code>.nav-tabs</code> class to generate a tabbed interface. </p>
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
          <input type="file" name="mainimg" accept="image/*" required>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
        </div>
        <div class="col-xl-12">
          <label class="form-col-label">Your Profits 1/units</label>
          <input type="number" name="profits">
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
              </div><!--1-->
              <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
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
          <input type="file" name="mainimg" accept="image/*" required>
          <input type="file" name="img2" accept="image/*" required>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
        </div>
        <div class="col-xl-12">
          <label class="form-col-label">Your Profits 1/units</label>
          <input type="number" name="profits">
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
              </div><!--2-->
              <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
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
          <input type="file" name="mainimg" accept="image/*" required>
          <input type="file" name="img2" accept="image/*" required>
          <input type="file" name="img3" accept="image/*" required>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
        </div>
        <div class="col-xl-12">
          <label class="form-col-label">Your Profits 1/units</label>
          <input type="number" name="profits">
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
          <input type="file" name="mainimg" accept="image/*" required>
          <input type="file" name="img2" accept="image/*" required>
          <input type="file" name="img3" accept="image/*" required>
          <input type="file" name="img4" accept="image/*" required>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
        </div>
        <div class="col-xl-12">
          <label class="form-col-label">Your Profits 1/units</label>
          <input type="number" name="profits">
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
          <input type="file" name="mainimg" accept="image/*" required>
          <input type="file" name="img2" accept="image/*" required>
          <input type="file" name="img3" accept="image/*" required>
          <input type="file" name="img4" accept="image/*" required>
          <input type="file" name="img5" accept="image/*" required>
        <div class="form-group">
          <label for="inputAddress">Description Products</label>
          <textarea type="text" name="description_products" class="form-control" placeholder="Type of description products"></textarea>
        </div>
        <div class="col-xl-12">
          <label class="form-col-label">Your Profits 1/units</label>
          <input type="number" name="profits">
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
</div>
@endsection
