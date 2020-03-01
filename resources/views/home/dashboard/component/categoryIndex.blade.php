<thead>
              <tr>
              <th>Name</th>
              <th>Created</th>
              <th>Action</th>
              </tr>
              </thead>
              @foreach($category as $p)
              <tbody>
              <td>{{$p->name}}</td>
              <td>{{$p->created_at->diffForHumans()}}</td>
              <td style="text-align: center;">
              <form action="{{route('dashboard.deletecategory', $p->id)}}" method="post">@csrf @method('DELETE')
              <a href="{{route('dashboard.editcategory', $p->id)}}
              " class="btn btn-primary font-12">Edit</a>
              <a style="color: white;cursor: pointer;" class="btn btn-danger font-12" data-toggle="modal" data-target="#deleteData{{$p->id}}">Delete</a>
              <!-- Modal -->
          <div class="modal fade" id="deleteData{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
          <div class="modal-content" style="margin-top:50%;">
          <div class="modal-body" style="color:black;">
                  Do you want delete data ?
                  <p><button type="submit" class="btn btn-primary">Yes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No
                  </button></p>
          </div>
          </div>
          </div>
          </div>
                  </form>
              </td>
              </tbody>
              @endforeach