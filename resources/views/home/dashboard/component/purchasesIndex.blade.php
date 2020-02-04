<div class="card-block">
                    <p class="m-0">Total purchase <?php  echo $co = DB::table('purchases')->where('user_id', Auth()->user()->id)->count(); ?><span class="float-xs-right"><a href="#" target="_blank">More data <i class="icon-arrow-right2"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Purchase ID</th>
                                <th>Products</th>
                                <th>Status</th>
                                <th>Locate</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($pu as $purchase)
                            <tr>
                              <td class="text-truncate">{{$purchase->purchase_id}}</td>
                              <td class="text-truncate"><?php
                                $data_pro = App\Models\Production::where('id',$purchase->production_id)->get();
                                foreach($data_pro as $data){
                                  echo base64_decode($data->name_products);
                                }
                                ?>
                                {{base64_decode($purchase->name_products)}}
                              </td>
                              <td class="text-truncate">
                                  @if($purchase->status == 'Pending')
                                  <span class="badge badge-danger">{{$purchase->status}}</span>
                                  @endif
                                  @if($purchase->status == 'Delivery')
                                  <span class="badge badge-warning">{{$purchase->status}}</span>
                                  @endif
                                  @if($purchase->status == 'Processing')
                                  <span class="badge badge-info">{{$purchase->status}}</span>
                                  @endif
                                  @if($purchase->status == 'Shipped')
                                  <span class="badge badge-success">{{$purchase->status}}</span>
                                  @endif
                                </td>
                                <td class="valign-middle">{{$purchase->locate}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>