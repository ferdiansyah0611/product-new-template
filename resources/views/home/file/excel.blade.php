@extends('templates')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card border-grey border-lighten-3">
            <div class="card-header">
                <button type="button" class="btn btn-success" id="modalNewFiles" data-toggle="tooltip" data-placement="bottom" title="Upload file">
                <i class="icon-upload3" style="font-size: 20px;"></i>
                </button>
                <button type="button" class="btn btn-success" id="refreshFileManager" data-toggle="tooltip" data-placement="bottom" title="Reload table">
                <i class="icon-reload" style="font-size: 20px;"></i>
                </button>
                <button data-action="expand" type="button" class="btn btn-success">
                <i class="icon-expand2" style="font-size: 20px;"></i>
                </button>
                <span style="float:right;">
                    <a href="{{$word->previousPageUrl()}}" class="float-left"><i class="fas fa-arrow-circle-left" style="font-size: 35px;"></i></a>
                    <a href="{{$word->nextPageUrl()}}" class="float-right"><i class="fas fa-arrow-circle-right" style="font-size: 35px;"></i></a>
                </span>
                </div><!-- card-header -->
                <div class="card-body">
                    <div class="card-block" style="max-height: 370px;overflow: auto;">
                        <div class="table-responsive font-small-2">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Name file</th>
                                        <th>Privacy</th>
                                        <th>Last Modified</th>
                                        <th>Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="FileManager">
                                    <?php
                                    foreach($word as $data){
                                    if($data->excel == true){
                                    ?>
                                    <tr>
                                        <td class="text-truncate">{{$data->name_file}}</td>
                                        <td><?php if($data->privacy == '1'){
                                                echo "Privates";
                                            }if($data->privacy == '2'){
                                                echo "Public";
                                        } ?></td>
                                        <td class="text-truncate">{{$data->updated_at}}</td>
                                        <td>{{File::size(public_path($data->excel))}} bytes</td>
                                        <td class="text-truncate">
                                            
                                            <form method="post" action="{{route('file.deletefile')}}">@csrf @method('delete')
                                                <input type="text" name="fileID" value="{{$data->id}}" hidden>
                                                <a href="{{url($data->excel)}}" class="text-white" download>
                                                    <button class="btn btn-danger" type="button" data-toggle="tooltip" data-placement="bottom" title="Download file">
                                                    <i class="fas fa-download"></i>
                                                </button></a>
                                                <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Delete file"><i class="icon-bin2"></i></button>
                                                <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Rename file"><i class="fas fa-edit"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    }//if
                                    }//foreach
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        </div><!-- card-block -->
                        </div><!-- card-body -->
                        </div><!-- card -->
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="newFiles" tabindex="-1" role="dialog" aria-labelledby="newFilesTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newFilesTitle">Upload excel</h5>
                            </div>
                            <form method="post" action="{{route('file.uploadfile')}}" enctype="multipart/form-data">@csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="fileName" placeholder="Name files">
                                        <input class="form-control" type="file" name="excel" accept=".xls,.xlsx">
                                        <select name="privacy" class="form-control">
                                            <option value="1" selected>Privacy</option>
                                            <option value="2">Public</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Discards</button>
                                    <button type="submit" class="btn btn-danger">Upload Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endsection
                @section('ajax')
                <script type="text/javascript">
                $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                    $('#refreshFileManager').click(function(){
                        $('#FileManager').load("{{url('/files/component/fileexcelID')}}");
                        $('#alertSuccess').css({"display":"block"});
                $('#alertSuccessContent').html('Reload data success');
                    });
                    $('#modalNewFiles').click(function(){
                        $('#newFiles').modal("show");
                    });
                });
                </script>
                @endsection