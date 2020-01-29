@php
$purchase = "ok";
$count = DB::table('purchases')->where('user_id', Auth()->user()->id)->count('count');
if($count < '4'){
    echo "<span class='description-percentage text-danger'><i class='fas fa-caret-down'></i> 1%</span>";
}
elseif($count < '8'){
    echo "<span class='description-percentage text-success'><i class='fas fa-caret-up'></i> 2%</span>";
}
@endphp