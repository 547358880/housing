/**
 * Created by Administrator on 2016/6/28.
 */
$(function() {
    var map = new BMap.Map("allmap");
    var labels = [];
    var markers = [];
    var checkOption = $('option:checked');
   // console.log(checkOption.data('child').length);
    var point = new BMap.Point(checkOption.data('lng'), checkOption.data('lat'));
    map.centerAndZoom(point, checkOption.data('zoom'));
    //map.addControl(new BMap.ZoomControl()); //添加地图缩放控件(极速版本)
    map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL}));// 左上角，添加比例尺
    map.enableScrollWheelZoom(true);

    var itemMarker = $('#itemMarker').data('value');
  //  var infowindow = new BMap.InfoWindow('dasdasd');
  //  console.log(itemMarker.length);
    map.addEventListener('zoomend', function(e) {
        if (map.getZoom() > 15) {
            for (var i = 0; i < labels.length; i++) {
                labels[i].show();
            }
        } else {
            for (var i = 0; i < labels.length; i++) {
                labels[i].hide();
            }
        }
    });


    for (var i = 0; i < itemMarker.length; i++) {
        var myIcon;
        var state = itemMarker[i]['state'].toString();

        var currenttime = itemMarker[i]['currentTime'].toString();
        var tip = '';
        if (currenttime > 0) {
            tip = currenttime;
        }

        switch (state) {
            case '1':
                myIcon = new BMap.Icon(baseUrl + "/img/chai" + tip +".png", new BMap.Size(37, 37));
                break;
            case '2':
                myIcon = new BMap.Icon(baseUrl + "/img/suan" + tip +".png", new BMap.Size(37, 37));
                break;
            case '3':
                myIcon = new BMap.Icon(baseUrl + "/img/jian" + tip +".png", new BMap.Size(37, 37));
                break;
            case '4':
                myIcon = new BMap.Icon(baseUrl + "/img/an" + tip +".png", new BMap.Size(37, 37));
                break;
            case '5':
                myIcon = new BMap.Icon(baseUrl + "/img/guan" + tip +".png", new BMap.Size(37, 37));
                break;
        }

        var marker = new BMap.Marker(new BMap.Point(itemMarker[i]['longitude'], itemMarker[i]['latitude']), {icon: myIcon});  //创建标注
        var overlay = map.addOverlay(marker);
    //    console.log(overlay);
        var label = new BMap.Label(itemMarker[i]['name'],{
            offset:new BMap.Size(20,-10)
        });
        label.setStyle({            //添加Lable的样式
            border: "none",
            color : "red",
            fontSize : "12px",
            height : "20px",
            lineHeight : "20px",
            fontFamily:"微软雅黑",
            display: 'none'
        });
    //    console.log(marker);
        marker.setLabel(label);
        labels.push(label);
        markers[i] = new Array();
        markers[i]['marker'] = marker;
        markers[i]['area'] = itemMarker[i]['area'];
        var sContent = "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>" + itemMarker[i].name +"</h4>" +
            "<img style='float:right;margin:4px' id='imgDemo' src='" + baseUrl + '/' + itemMarker[i].image + "' width='139' height='104' title='天安门'/>" +
            "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>" + itemMarker[i].intro + "</p>" +
            "<a href='" + baseUrl + "/website/items/detail/" + itemMarker[i].id + "'>详情</a></div>";
    //    infowindow.setContent(sContent);
        addClickHandler(sContent, marker);
    }

    //console.log(markers);

    function addClickHandler(content, marker) {
        marker.addEventListener("click",function(e) {
            var infoWindow = new BMap.InfoWindow(content);
            this.openInfoWindow(infoWindow);
        });
    }

   // console.log(_.indexOf([9], 9));

    $('#area').change(function() {
        var areaId = $(this).val();
        var checkOption = $('option:checked');
        map.panTo(new BMap.Point(checkOption.data('lng'), checkOption.data('lat')));
        var child = checkOption.data('child');
        for (i in markers) {
            markers[i].marker.hide();
            var area = markers[i].area;
            for (j = 0; j < area.length; j++) {
                if ((_.indexOf(child, area[j])) > -1) {     //如果在这个区域内
                    markers[i].marker.show();
                    //console.log('111');
                }
            }
        }
        map.setZoom(checkOption.data('zoom'));
        getStateCount();
    });


    $('.btn-01').click(function() {
        //console.log($(this).data('state'));
        location.href = baseUrl + '/website/items/lists?state=' + $(this).data('state') + '&areaId=' + $('#area').val();
    });

    function getStateCount() {
        //请求数据
        $.ajax({
            type: 'post',
            url: baseUrl + '/website/map/getData',
            data: {areaId: $('#area').val()},
            dataType: 'json',
            beforeSend: function (xmlHttpRequest) {
                index = layer.load(1, {
                    shade: [0.1, '#fff'] //0.1透明度的白色背景
                });
            },
            complete: function (xmlHttpRequest) {
                layer.close(index);
            },
            success: function(data) {
                $('#chai').text(0);
                $('#suan').text(0);
                $('#jian').text(0);
                $('#an').text(0);
                $('#guan').text(0);
                for (x in data) {
                    switch (x) {
                        case '1':
                            $('#chai').text(data[x]);
                            break;
                        case '2':
                            $('#suan').text(data[x]);
                            break;
                        case '3':
                            $('#jian').text(data[x]);
                            break;
                        case '4':
                            $('#an').text(data[x]);
                            break;
                        case '5':
                            $('#guan').text(data[x]);
                            break;
                    }
                }
            },
            error: function(xmlHttpRequest) {
                alert('错误啦,请重新加载页面!')
                layer.close(index);
            }
        });
    }
    getStateCount();
})