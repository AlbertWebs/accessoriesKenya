
<?php $Orders = DB::table('orders')->OrderBy('id','ASC')->limit('2')->get(); $count = 10; ?>
@if($Orders->isEmpty())

@else
<script>
    $(function() {
        

        @foreach($Orders as $Order)
        <?php $OrderProduct = DB::table('orders_products')->where('orders_id',$Order->id)->get() ?>
           @if($OrderProduct->isEmpty())

           @else
                @foreach($OrderProduct as $OP)
                    <?php $Product = DB::table('product')->where('id',$OP->products_id)->get();  ?>
                    
                        @if($Product->isEmpty())

                        @else
                            @foreach($Product as $product)
                                    <?php $UserInfo = DB::table('users')->where('id',$Order->user_id)->get(); ?>
                                    @if($UserInfo->isEmpty())

                                    @else
                                        @foreach($UserInfo as $User)
                                            setTimeout(function() {
                                                $.notify({
                                                    // options
                                                    icon: '',
                                                    title: "<a href=\"{{url('/')}}/classifieds/{{$product->code}}\" target=\"new\"><h4>Recent Sales</h4>",
                                                    message: "<figure><img src=\"{{url('/')}}/uploads/logo/favicon.png\"></figure><p>Someone from {{$User->location}} has bought {{$product->name}} (<?php  $timestamp = $Order->created_at; echo timeago($timestamp); ?>).</a> "
                                                }, {
                                                    // settings
                                                    icon_type: 'image',
                                                    type: 'info',
                                                    delay: 3000,
                                                    timer: 500,
                                                    z_index: 999999999999,
                                                    showProgressbar: false,
                                                    placement: {
                                                        from: "bottom",
                                                        align: "left"
                                                    },
                                                    animate: {
                                                        enter: 'animated bounceInUp',
                                                        exit: 'animated bounceOutDown'
                                                    },
                                                });
                                            }, {{$count}}000); // change the start delay
                                        @endforeach
                                    @endif
                                
                            @endforeach
                        @endif
                @endforeach
            @endif
            <?php $count = $count+5; ?>
            <?php $count = $count+5; ?>
            <?php $count = $count+5; ?>
        @endforeach
        
        // Iterations Stops
        
    });
</script>
    @endif