<?php  
foreach($word as $data){
if($data->image == true){
?>
            <tr>
            <td class="text-truncate">{{$data->name_file}}</td>
            <td><?php if($data->privacy == '1'){
            	echo "Privates";
            }if($data->privacy == '2'){
            	echo "Public";
            } ?></td>
            <td class="text-truncate">{{$data->updated_at}}</td>
            <td>{{File::size(public_path($data->image))}} bytes</td>
            <td class="text-truncate">
            	
            	<form id="delete_file" method="post" action="{{route('file.deletefile')}}">@csrf @method('delete')
            		<input type="text" name="fileID" value="{{$data->id}}" hidden>
            		<a href="{{url($data->image)}}" class="text-white" download>
            		<button class="btn btn-danger" type="button" data-toggle="tooltip" data-placement="bottom" title="Download file">
            		<i class="fas fa-download"></i>
            	</button></a>
            	<button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Delete file"><i class="icon-bin2"></i></button>
            	<button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Rename file"><i class="fas fa-edit"></i></button>
            	</form>
            </td>
            </tr>@endforeach
            <div class="card-footer">
                  <span>Views {{$word->count()}} of {{$word->total()}}</span>
            </div>
<?php 
}//if
}//foreach
?>