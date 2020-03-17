$(document).ready(function(){
        /*$(document).ajaxStart(function(){
            $('#searchBody').html("<h3 class='text-uppercase notfound text-xs-center'>Loading</h3>");
        });*/
        $('select.customselect').change(function(){
            var selected = $(this).children('option:selected').val();
            var value = $('.keySearch').val();
            $('.product').remove();
            if(selected == 'product')
            {
                $.get("/searching"+'-'+selected+'?search='+value, function(data) 
                {
                    $('#nextSearch').attr('data-id',data.next_page_url);
                    if(data.total > '0')
                    {
                        $.each(data.data, function(index, val)
                        {
                            $('.notfound').empty();
                            $('#searchBody').css('display','flow-root');
                            $('#searchModal').modal("show");
                            $('#footerContent').html("<a id='nextPage' data-link="+data.next_page_url+" href="+'javascript:void(0)'+">Next</a>");
                            $('#searchModalTitle').css({'display':'block','float':'left'});
                            $('#searchModalTitle').html("Total data result : "+data.total);
                            if(val.conditions == '1')
                            {
                                if(val.discount == null)
                                {
                                    var parse = $.parseJSON(val.main_pictures);
                                    $('#searchBody')
                                    .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products' data-id="+val.id+">"+
                                    "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                    "<img src="+"/storage/image"+'/'+parse.image_1+" width='100%' height='120px'>"+
                                    "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                    "</div>");
                                }
                                else
                                {
                                    var count = val.discount /100*val.price;
                                    var get = val.price - count;
                                    var parse = $.parseJSON(val.main_pictures);
                                    $('#searchBody')
                                    .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left text-xs-center text-md-center text-xl-center text-lg-center' id='products' data-id="+val.id+">"+
                                    "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                    "<div class='tag tag-pill tag-danger' style='position: absolute;border-radius: 0;right: 14px;'>-"+val.discount+"%</div>"+
                                    "<img src="+"/storage/image"+'/'+parse.image_1+" width='100%' height='120px'>"+
                                    "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                    "<p class='flow-root'>"+
                                    "<span class='text-danger font-medium-1 font-weight-bold link-small'>Rp. "+get+"</span> "+
                                    "<span class='text-grey' style='text-decoration: line-through;'>Rp. "+val.price+"</span>"+
                                    "</p>"+
                                    "</div>");
                                }
                            }//conditions 1
                            if(val.conditions == '2')
                            {
                                if(val.discount == null)
                                {
                                    var parse = $.parseJSON(val.main_pictures);
                                    $('#searchBody')
                                    .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products' data-id="+val.id+">"+
                                    "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                    "<img src="+"/storage/image"+'/'+parse.image_1+" width='100%' height='120px'>"+
                                    "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                    "</div>");
                                }
                                else
                                {
                                    var count = val.discount /100*val.price;
                                    var get = val.price - count;
                                    var parse = $.parseJSON(val.main_pictures);
                                    $('#searchBody')
                                    .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left text-xs-center text-md-center text-xl-center text-lg-center' id='products' data-id="+val.id+">"+
                                    "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                    "<div class='tag tag-pill tag-danger' style='position: absolute;border-radius: 0;right: 14px;'>-"+val.discount+"%</div>"+
                                    "<img src="+"/storage/image"+'/'+parse.image_1+" width='100%' height='120px'>"+
                                    "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                    "<p class='flow-root'>"+
                                    "<span class='text-danger font-medium-1 font-weight-bold link-small'>Rp. "+get+"</span> "+
                                    "<span class='text-grey' style='text-decoration: line-through;'>Rp. "+val.price+"</span>"+
                                    "</p>"+
                                    "</div>");
                                }
                            }//conditions 2
                        });//EACH
                    }//>0
                    if(data.total == '0')
                    {
                        $('#searchBody').css('display','flow-root');
                        $('.product').remove();
                        $('#searchModalTitle').text('Total data result : Not Founds');
                        $('#searchBody').html("<h3 class='text-uppercase notfound text-xs-center'>Sorry, your search was not found in our database</h3>");
                    }
                });//get
            }//if product
            if(selected == 'users')
            {
                $.get("/searching"+'-'+selected+'?search='+value, function(data)
                {
                    $('#nextSearch').attr('data-id',data.next_page_url);
                    if(value == '')
                    {
                        $('#searchBody').css('display','flow-root');
                        $('.product').remove();
                        $('#searchModalTitle').text("Total data result : You haven't typed yet");
                        $('#searchBody').html("<h3 class='text-uppercase notfound text-xs-center'>Type what you are looking for now!</h3>");
                    }
                    else
                    {
                        if(data.total > '0')
                        {
                            $.each(data.data, function(index, val)
                            {
                                $('.notfound').empty();
                                $('#searchBody').css('display','flow-root');
                                $('#searchModal').modal("show");
                                $('#footerContent').html("<a id='nextPage' data-link="+data.next_page_url+" href="+'javascript:void(0)'+">Next</a>");
                                $('#searchModalTitle').css({'display':'block','float':'left'});
                                $('#searchModalTitle').html("Total data result : "+data.total);
                                if(val.avatars == null)
                                {
                                    $('#searchBody')
                                    .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products'>"+
                                    "<div class='tag tag-pill tag-primary' style='position: absolute;border-radius: 0;left: 14px;'>"+val.created_at+"</div>"+
                                    "<img src="+"{{asset('/user-default.png')}}"+" width='100%' height='200px'>"+
                                    "<p class='font-weight-bold' style='margin-bottom:0;'><a href='{{url('profiles/views')}}"+'/'+val.name_store+"'>"+val.name+"</a></p>"+
                                    "<p>"+val.locate+"</p>"+
                                    "</div>");
                                }
                                else
                                {
                                    $('#searchBody')
                                    .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products'>"+
                                    "<img src="+"/storage/image"+'/'+val.avatars+" width='100%' height='200px'>"+val.name+val.locate+
                                    "</div>");
                                }  
                            });
                        }//>0
                        if(data.total == '0')
                        {
                            $('#searchBody').css('display','flow-root');
                            $('.product').remove();
                            $('#searchModalTitle').text('Total data result : Not Founds');
                            $('#searchBody').html("<h3 class='text-uppercase notfound text-xs-center'>Sorry, your search was not found in our database</h3>");
                        } 
                    }
            
            
                });//get
            }//if users
        });
        //////////////////////////////////////////////////////////////////////////////////////////
        $('body').on('keyup','.keySearch',function(e){
            $('.product').remove();
            e.preventDefault();
            var value = $(this).val();
            var filter = $('select.customselect').children('option:selected').val();
            //interval
            $.get("/searching"+'-'+filter+'?search='+value, function(data)
            {
                $('#nextSearch').attr('data-id',data.next_page_url);
                if(value == '')
                {
                    $('#searchBody').css('display','flow-root');
                    $('.product').remove();
                    $('#searchModalTitle').text("Total data result : You haven't typed yet");
                    $('#searchBody').html("<h3 class='text-uppercase notfound text-xs-center'>Type what you are looking for now!</h3>");
                }
                else
                {
                   if(data.total > '0')
                   {
                        if(filter == 'product')
                        {
                            $.each(data.data, function(index, val) 
                            {
                                $('.notfound').empty();
                                $('#searchBody').css('display','flow-root');
                                $('#searchModal').modal("show");
                                $('#footerContent').html("<a id='nextPage' data-link="+data.next_page_url+" href="+'javascript:void(0)'+">Next</a>");
                                $('#searchModalTitle').css({'display':'block','float':'left'});
                                $('#searchModalTitle').html("Total data result : "+data.total);
                                if(val.conditions == '1')
                                {
                                    if(val.discount == null)
                                    {
                                        var parse = $.parseJSON(val.main_pictures);
                                        $('#searchBody')
                                        .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products' data-id="+val.id+">"+
                                        "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                        "<img src="+"/storage/image"+'/'+parse.image_1+" width='100%' height='120px'>"+
                                        "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                        "</div>");
                                    }
                                    else
                                    {
                                        var count = val.discount /100*val.price;
                                        var get = val.price - count;
                                        var parse = $.parseJSON(val.main_pictures);
                                        $('#searchBody')
                                        .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left text-xs-center text-md-center text-xl-center text-lg-center' id='products' data-id="+val.id+">"+
                                        "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                        "<div class='tag tag-pill tag-danger' style='position: absolute;border-radius: 0;right: 14px;'>-"+val.discount+"%</div>"+
                                        "<img src="+"/storage/image"+'/'+parse.image_1+" width='100%' height='120px'>"+
                                        "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                        "<p class='flow-root'>"+
                                        "<span class='text-danger font-medium-1 font-weight-bold link-small'>Rp. "+get+"</span> "+
                                        "<span class='text-grey' style='text-decoration: line-through;'>Rp. "+val.price+"</span>"+
                                        "</p>"+
                                        "</div>");
                                    }
                                }//conditions 1
                                if(val.conditions == '2')
                                {
                                    if(val.discount == null)
                                    {
                                        var parse = $.parseJSON(val.main_pictures);
                                        $('#searchBody')
                                        .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products' data-id="+val.id+">"+
                                        "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                        "<img src="+"/storage/image"+'/'+parse.image_1+" width='100%' height='120px'>"+
                                        "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                        "</div>");
                                    }
                                    else
                                    {
                                        var count = val.discount /100*val.price;
                                        var get = val.price - count;
                                        var parse = $.parseJSON(val.main_pictures);
                                        $('#searchBody')
                                        .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left text-xs-center text-md-center text-xl-center text-lg-center' id='products' data-id="+val.id+">"+
                                        "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                        "<div class='tag tag-pill tag-danger' style='position: absolute;border-radius: 0;right: 14px;'>-"+val.discount+"%</div>"+
                                        "<img src="+"/storage/image"+'/'+parse.image_1+" width='100%' height='120px'>"+
                                        "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                        "<p class='flow-root'>"+
                                        "<span class='text-danger font-medium-1 font-weight-bold link-small'>Rp. "+get+"</span> "+
                                        "<span class='text-grey' style='text-decoration: line-through;'>Rp. "+val.price+"</span>"+
                                        "</p>"+
                                        "</div>");
                                    }
                                }//conditions 2
                            });//EACH
                        }/*ifproducct*/
                        if(filter == 'users')
                        {
                            $.each(data.data, function(index, val)
                            {
                                $('.notfound').empty();
                                $('#searchBody').css('display','flow-root');
                                $('#searchModal').modal("show");
                                $('#footerContent').html("<a id='nextPage' data-link="+data.next_page_url+" href="+'javascript:void(0)'+">Next</a>");
                                $('#searchModalTitle').css({'display':'block','float':'left'});
                                $('#searchModalTitle').html("Total data result : "+data.total);
                                if(val.avatars == null)
                                {
                                    $('#searchBody')
                                    .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products'>"+
                                    "<div class='tag tag-pill tag-primary' style='position: absolute;border-radius: 0;left: 14px;'>"+val.created_at+"</div>"+
                                    "<img src="+"{{asset('/user-default.png')}}"+" width='100%' height='200px'>"+
                                    "<p class='font-weight-bold' style='margin-bottom:0;'><a href='{{url('profiles/views')}}"+'/'+val.name_store+"'>"+val.name+"</a></p>"+
                                    "<p>"+val.locate+"</p>"+
                                    "</div>");
                                }
                                else
                                {
                                    $('#searchBody')
                                    .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products'>"+
                                    "<img src="+"/storage/image"+'/'+val.avatars+" width='100%' height='200px'>"+val.name+val.locate+
                                    "</div>");
                                }
                            });/*each data*/
                        }/*users*/
                    }//>0
                    if(data.total == '0')
                    {
                        $('#searchBody').css('display','flow-root');
                        $('.product').remove();
                        $('#searchModalTitle').text('Total data result : Not Founds');
                        $('#searchBody').html("<h3 class='text-uppercase notfound text-xs-center'>Sorry, your search was not found in our database</h3>");
                    }
                }/*else*/
            });//get
        });//keyup
        //////////////////////////////////////////////////////////////////////////////////////////
        $('body').on('click','.locked',function(){
            $('input[name=selectsearch]').attr('readonly', true);
            $('.locked').attr('id', 'locking');
            $('.locked').removeClass('locked');
        });
            $('#locking').click(function(event) {
            $('input[name=selectsearch]').attr('readonly', false);
            $('#locking').addClass('locked');
        });
        //////////////////////////////////////////////////////////////////////////////////////////
        $('body').on('keyup', '.keySearch',function(){
            var data = $(this).val();
            $('#countSearchText').css({
                'font-size': '16px',
                'text-decoration': 'underline',
                'text-align-last': 'center',
                'font-variant-caps': 'all-petite-caps',
            });
            $('#countSearchText').text('Search data for '+data);
        });
        //////////////////////////////////////////////////////////////////////////////////////////
        $('#nextSearch').click(function(){
            $('.product').remove();
            var value = $('.keySearch').val();
            var countNumber = $(this).data('id');
            var selected = $('.customselect').children('option:selected').val();
                $.get(countNumber+'&search='+value, function(data)
                {
                    $('#nextSearch').attr('data-id',data.next_page_url);
                    if(selected == 'product')
                    {
                        if(value == '')
                        {
                            $('#searchBody').css('display','flow-root');
                            $('.product').remove();
                            $('#searchModalTitle').text("Total data result : You haven't typed yet");
                            $('#searchBody').html("<h3 class='text-uppercase notfound text-xs-center'>Type what you are looking for now!</h3>");
                        }
                        else
                        {
                            if(data.total > '0')
                            {
                                $.each(data.data, function(index, val)
                                {
                                    $('.notfound').empty();
                                    $('#searchBody').css('display','flow-root');
                                    $('#searchModal').modal("show");
                                    $('#footerContent').html("<a id='nextPage' data-link="+data.next_page_url+" href="+'javascript:void(0)'+">Next</a>");
                                    $('#searchModalTitle').css({'display':'block','float':'left'});
                                    $('#searchModalTitle').html("Total data result : "+data.total);
                                    if(val.conditions == '1')
                                    {
                                        if(val.discount == null)
                                        {
                                            $('#searchBody')
                                            .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products' data-id="+val.id+">"+
                                            "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                            "<img src="+"/storage/image"+'/'+val.main_pictures+" width='100%' height='120px'>"+
                                            "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                            "</div>");
                                        }
                                        else
                                        {
                                            var count = val.discount /100*val.price;
                                            var get = val.price - count;
                                            $('#searchBody')
                                            .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left text-xs-center text-md-center text-xl-center text-lg-center' id='products' data-id="+val.id+">"+
                                            "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                            "<div class='tag tag-pill tag-danger' style='position: absolute;border-radius: 0;right: 14px;'>-"+val.discount+"%</div>"+
                                            "<img src="+"/storage/image"+'/'+val.main_pictures+" width='100%' height='120px'>"+
                                            "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                            "<p class='flow-root'>"+
                                            "<span class='text-danger font-medium-1 font-weight-bold link-small'>Rp. "+get+"</span> "+
                                            "<span class='text-grey' style='text-decoration: line-through;'>Rp. "+val.price+"</span>"+
                                            "</p>"+
                                            "</div>");
                                        }
                                    }//conditions 1
                                    if(val.conditions == '2')
                                    {
                                        if(val.discount == null)
                                        {
                                            $('#searchBody')
                                            .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left' id='products' data-id="+val.id+">"+
                                            "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                            "<img src="+"/storage/image"+'/'+val.main_pictures+" width='100%' height='120px'>"+
                                            "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                            "</div>");
                                        }
                                        else
                                        {
                                            var count = val.discount /100*val.price;
                                            var get = val.price - count;
                                            $('#searchBody')
                                            .append("<div class='product col-xs-6 col-md-3 col-xl-3 col-lg-3 float-left text-xs-center text-md-center text-xl-center text-lg-center' id='products' data-id="+val.id+">"+
                                            "<div class='tag tag-pill tag-info' style='position: absolute;border-radius: 0;left: 14px;'>New</div>"+
                                            "<div class='tag tag-pill tag-danger' style='position: absolute;border-radius: 0;right: 14px;'>-"+val.discount+"%</div>"+
                                            "<img src="+"/storage/image"+'/'+val.main_pictures+" width='100%' height='120px'>"+
                                            "<a class='title-col-xl-3 hover-underline'  href='"+"/productions/views"+'/'+val.title+"' style='font-size: 19px;font-family: 'Cuprum-Regular';'>"+val.name_products+"</a>"+
                                            "<p class='flow-root'>"+
                                            "<span class='text-danger font-medium-1 font-weight-bold link-small'>Rp. "+get+"</span> "+
                                            "<span class='text-grey' style='text-decoration: line-through;'>Rp. "+val.price+"</span>"+
                                            "</p>"+
                                            "</div>");
                                        }//else
                                    }//conditions 2
                                });//eachdata
                            }//>0
                            if(data.total == '0')
                            {
                                $('#searchBody').css('display','flow-root');
                                $('.product').remove();
                                $('#searchModalTitle').text('Total data result : Not Founds');
                                $('#searchBody').html("<h3 class='text-uppercase notfound text-xs-center'>Sorry, your search was not found in our database</h3>");
                            }//0
                        }//else
                    }/*if-product*/
                    $('#nextSearch').attr('data-id',data.next_page_url);
                });//get
            });//next
        //////////////////////////////////////////////////////////////////////////////////////////
});