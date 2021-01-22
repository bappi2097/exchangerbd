<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: "{{route('ajax.get-wallet')}}",
            success: function(data){
                data.forEach(element => {
                    var html = '<div class="rate-box">'+
                        '<div class="buy-sell">'+
                            '<table class="tbl">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th class="tbl-head" colspan="2">'+element.name+'</th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>'+
                                    '<tr>'+
                                        '<td class="tbl-row-1-left">BUY</td>'+
                                        '<td class="tbl-row-1-right">SELL</td>'+
                                    '</tr>'+
                                    '<tr>'+
                                        '<td class="tbl-row-2-left">'+element.buy+'</td>'+
                                        '<td class="tbl-row-2-right">'+element.sell+'</td>'+
                                    '</tr>'+
                                '</tbody>'+
                            '</table>'+
                        '</div>'+
                        '<p class="reserve">Reserve</p>'+
                        '<p class="reserve-amount">'+element.reserve+'</p>'+
                    '</div>';
                    $('#autoscroll').append(html);
                });
            },
            error:function(error){
                console.log(error);
            },
        });
    });
</script>
