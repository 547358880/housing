<div class="table">
    <div border="1" style="width: 100%;height: 40px;">
        <a class="td-text td-text02 <?php if ($this->request->params['action'] == 'detail') echo 'td-01';?>" href="<?php echo $this->Url->build('/website/items/detail/' . $flows->item->id);?>">基本信息</a>
        <a class="td-text td-text02 <?php if ($this->request->params['action'] == 'accordion') echo 'td-01';?>" href="<?php echo $this->Url->build('/website/items/accordion/' .  $flows->item->id); ?>">项目进度</a>
        <a class="td-text td-text02 <?php if ($this->request->params['action'] == 'lists') echo 'td-01';?>" href="<?php echo $this->Url->build('/website/notices/lists/' .  $flows->item->id); ?>">项目提醒</a>
    </div>
</div>
<div style="float: right; margin: 10px 10px 0 0"><img src="<?php echo $this->request->base?>/images/text.png"></div>
<div id="main" style="width:100%;position: relative;left: 0;top: 0;"></div>
<?php $this->start('afterScript');?>
<script type="text/javascript" src="<?php echo $this->request->base?>/js/raphael.min.js"></script>
<script type="text/javascript" src="<?php echo $this->request->base?>/js/connection.js"></script>
<script type="text/javascript" src="<?php echo $this->request->base; ?>/layer/layer.js"></script>
<script type="text/javascript">
    $(function() {
        var nodeLevel1 = eval('<?php echo $parentNodes; ?>');
        var flowsId = "<?php echo $flows->id ?>";
        var parentShapes = [];
        var currentParentState = "<?php echo $flows->item->currentParent ?>";           //当前大节点
        var parentIndex = "<?php echo $parentIndex; ?>";
        var currentChildState = "<?php echo $flows->item->currentChild ?>";                //当前小节点
        var startX = 30,
            interval = 120,     //图形间隔
            startY = 50;
        //1级节点
        var paper = new Raphael('main', 350, 650);
    //    var t = [];
        for (var i = 0; i < nodeLevel1.length; i++) {
            var addY = interval*i + startY;
            var path = "M" + (startX+80) + "," + addY +
                        "L" + (startX+120) + "," + addY +
                        "L" + (startX+140) + "," + (addY+32) +
                        "L" + (startX+120) + "," + (addY+64) +
                        "L" + (startX+80) + "," + (addY+64) +
                        "L" + (startX+60)  + "," + (addY+32) +
                        "L" + (startX+80) + "," + addY;
            t = paper.path(path)
                .data({
                    id: nodeLevel1[i].id
                });
            /* 六边形的样式 */
            t.attr({
                "fill": '#9a9a9a',
            //    "fill": '#97d83b',
                "cursor": 'pointer',
                "stroke":"#d7d7d7", // the color of the border
                "stroke-width":6
            });
            //区分颜色
            if (parentIndex >= 0) {
                if (parentIndex > i) {
                    t.attr('fill', '#97d83b');
                } else if(parentIndex == i) {
//                    console.log(new Date().toLocaleDateString());
//                    console.log(nodeLevel1[i].endtime);
                    if (new Date(new Date().toLocaleDateString()) > new Date(nodeLevel1[i].endtime)) {      //大于节点截至时间,节点为延迟
                        t.attr('fill', '#f95858');
                    } else {
                        t.attr('fill', '#68b0e8');
                    }
                }
            }
            //文字
            paper.text(startX + 100, addY + 32, nodeLevel1[i].name).attr({
                'fill': '#fff',
                'font-weight': "bold",
                'font-size': "14px"
            });
            //添加左边时间轴
            var b = paper.circle(startX - 20, addY + 32, 0);
            paper.text(startX + 25, addY + 20, nodeLevel1[i].endtime);         //时间
            paper.image(baseUrl + '/img/time.png', startX - 20, addY + 15, 10, 10);
            paper.connection(b, t, '#d7d7d7');
            //点击事件
            t.click(function() {
                //console.log(this.data('id'));
                getChildData(this.data('id'));
            });
            parentShapes[i] = t;
        }

        //添加各个节点的关系
        for (var i = 0; i < parentShapes.length - 1; i++) {
            paper.connection(parentShapes[i], parentShapes[i+1], '#d7d7d7');
        }

        var element = [];
        function getChildData(parentId) {
            var childrenShapes = [];
            $.ajax({
                type: 'post',
                url: baseUrl + '/website/items/getChildren',
                data: {parentId: parentId, flowsId: flowsId, currentChildState: currentChildState},
                dataType: 'json',
                beforeSend: function (xmlHttpRequest) {
                    index = layer.load(1, {
                        shade: [0.1, '#fff'] //0.1透明度的白色背景
                    });
                },
                complete: function (xmlHttpRequest) {
                    layer.close(index);
                },
                success: function (data) {
                    var childrenIndex = data.resultIndex;
                    data = data.result;
                    if (element) {
                        for (var j = 0; j < element.length; j++) {
                            element[j].remove();
                        }
                        element = [];
                    }
                    //子节点
                    var childStartX = startX + 90,
                        childStartY = startY + 200,
                        childInterval = 80;

                    for (var i = 0; i < data.length; i++) {
                        //    console.log(111);
                        var addY = childInterval*i + childStartY;
                        var path = "M" + (childStartX+80) + "," + addY +
                            "L" + (childStartX+110) + "," + addY +
                            "L" + (childStartX+125) + "," + (addY+26) +
                            "L" + (childStartX+110) + "," + (addY+52) +
                            "L" + (childStartX+80) + "," + (addY+52) +
                            "L" + (childStartX+65)  + "," + (addY+26) +
                            "L" + (childStartX+80) + "," + addY;

                        var t = paper.path(path)
                            .data({
                                id: data[i].id
                            });
                        element.push(t);

                        /* 六边形的样式 */
                        t.attr({
                            "fill": '#9a9a9a',
                            "cursor": 'pointer',
                        });

                    //    console.log(childrenIndex);
                        //区分颜色
                        if (childrenIndex >= 0) {
                            if (childrenIndex > i) {
                                t.attr('fill', '#97d83b');
                            } else if(childrenIndex == i) {
                                //t.attr('fill', '#f95858');
                                if (new Date(new Date().toLocaleDateString()) > new Date(data[i].endtime)) {      //大于节点截至时间,节点为延迟
                                    t.attr('fill', '#f95858');
                                } else {
                                    t.attr('fill', '#68b0e8');
                                }
                            }
                        }
                        //添加右边时间轴
                        var b = paper.circle(childStartX + 230, addY + 28, 0);
                        element.push(b);
                        //上部分时间抽
                        element.push(paper.text(childStartX + 170, addY + 18, data[i].endtime));
                        element.push(paper.image(baseUrl + '/img/time.png', childStartX + 127, addY + 13, 10, 10));
                        element.push(paper.text(childStartX + 160, addY + 35, data[i].name));
                        var bt = paper.connection(b, t, '#d7d7d7');
                        element.push(bt.line);

                        t.click(function() {
                            alert('这是个点击节点,这里可以填出些内容');
                        });
                        childrenShapes[i] = t;
                    }

                    //添加各个节点的关系
                    for (var i = 0; i < childrenShapes.length - 1; i++) {
                        var connection = paper.connection(childrenShapes[i], childrenShapes[i+1], '#d7d7d7');
                        element.push(connection.line);
                    }
                },
                error: function (xmlHttpRequest) {
                    layer.close(index);
                    alert('出错啦,请重新加载!');
                }
            });
        }
        var parentId = (currentParentState == 0) ? nodeLevel1[0]['id'] : currentParentState;
    //    console.log(parentId);
        getChildData(parentId);
    })
</script>
<?php $this->end(); ?>
