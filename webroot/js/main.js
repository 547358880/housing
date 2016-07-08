/**
 * Created by Administrator on 2016/6/29.
 */
//加载数据
function initLoadMore(a) {
    var b = 1;
    c = {
        debug: !1,
        url: '',
        prefix: '',
        targetSelector: '',
        loadmoreSelctor: '.j-loadmore',
        tpl: '',
        data:{
            page: b
        },
        callback: null
    }

    d = $.extend(!0, {}, c, a);
    var c = $(d.loadmoreSelctor);
    $(window).scroll(function() {
        var a = $(window).scrollTop() >= $(document).height() - $(window).height() ? !0 : !1;
        if (a) {
            $(d.targetSelector).children().attr('rel', 'loaded');       //添加已经load的属性
            for(i in pageParam) {               //分页额外参数
                d.data.i = pageParam.i;
            }
            d.data.page = b = parseInt(b) + 1;
            return $.ajax({
                url: d.url,
                type: "post",
                dataType: "json",
                data: d.data,
                beforeSend: function() {
                    $(".more-message").show();
                },
                success: function(a) {
                    if (d.prefix) {
                        a = a[d.prefix];
                    }
                    //console.log(a);
                    if (a.length) {
                        var b = _.template(d.tpl, {
                                dataset: a
                            }),
                            e = $(b);
                        $(d.targetSelector).append(e);
                        var objectsRendered = $(d.targetSelector).children('[rel!=loaded]');
                        fadeInWithDelay(objectsRendered);
                    } 
                    $(".more-message").hide();
                    d.callback && d.callback(e)
                },
                error: function(xmlHttpRequest) {
                    if (xmlHttpRequest.status = 404) {
                        $(".more-message").hide();
                        return false;
                    }
                }
            }), !1
        }
    });
}

//延时加载
function fadeInWithDelay(obj){
    var delay = 0;
    return obj.each(function(){
        $(this).delay(delay).animate({opacity:1}, 200);
        delay += 100;
    })
}