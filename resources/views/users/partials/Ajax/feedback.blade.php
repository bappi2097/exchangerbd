<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: "{{route('ajax.get-feedback')}}",
            success: function(data){
                if(Array.isArray(data) && data.length){
                    var html = '<div class="rowr">'+
                        '<h2>Feedback</h2>'+
                    '</div>'+
                        '<div class="rowr horizontal-scroll" id="feedback">'+
                    '</div>';
                    $('#review').append(html);
                }
                data.forEach(element => {
                    html = '<div class="review-box">'+
                        '<div class="review-head">'+
                            '<div class="user-img left">'+
                                '<img src="logo/admin-1.jpg" alt="User Name" />'+
                            '</div>'+
                            '<div class="user-name left">'+
                                '<span>'+element.full_name+'</span>'+
                            '</div>'+
                        '</div>'+
                        '<div class="review-star">'+
                            '<i class="fa fa-star '+ (element.star>0 ? 'glow' : '') +'"></i>'+
                            '<i class="fa fa-star '+ (element.star>1 ? 'glow' : '') +'"></i>'+
                            '<i class="fa fa-star '+ (element.star>2 ? 'glow' : '') +'"></i>'+
                            '<i class="fa fa-star '+ (element.star>3 ? 'glow' : '') +'"></i>'+
                            '<i class="fa fa-star '+ (element.star>4 ? 'glow' : '') +'"></i>'+
                        '</div>'+
                        '<div class="review-body">'+
                        element.feedback+
                        '</div>'+
                    '</div>';
                    $('#feedback').append(html);
                });
            },
            error:function(error){
                console.log(error);
            },
        });
    });
</script>
