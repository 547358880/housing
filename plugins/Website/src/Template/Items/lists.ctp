<div class="table">
    <div border="1" style="width: 100%;height: 40px;">
        <div class="td-text01 td-text" >
            <select class="sel-01" id="areaId">
                <?php foreach ($areas as $key => $item) {?>
                    <option value="<?php echo $key ?>" <?php if (isset($areaId) && $areaId == $key) echo 'selected';?>><?php echo $item['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="td-text01 td-text" >
            <select class="sel-01" id="state">
                <option value="">状态</option>
                <?php foreach($itemState as $key => $val) {?>
                    <option value="<?php echo $key;?>" <?php if (isset($state) && $state == $key) echo 'selected';?>><?php echo $val; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<div class="clear"></div>
<div>
    <div id="list">
        <?php foreach ($items as $it) {?>
        <div class="mui-row item">
            <a href="<?php echo $this->Url->build('/website/items/detail/' . $it->item->id);?>">
                <div>
                    <img class="item-img" src="<?php echo $this->request->base.'/'.$it->item->image ;?>" />
                    <div class="item-tex">
                        <span class="text01"><?php echo $it->item->name; ?></span>
                        <img class="btn-02" src="<?php echo $this->request->base; ?>/img/<?php echo $it->item->state;?>.png" />
                        <p class="text02">项目详情:<?php echo $it->item->intro;?></p>
                    </div>
                    <span class="arrow">&gt;</span>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
    <div class="loadmore">
        <span class="more-message" style="display: none">加载更多<i class="loadmore-icon"></i></span>
    </div>
</div>
<script type="text/j-template" id="tpl_items_lists">
    <% if (dataset.length) { %>
    <%  _.each(dataset, function(it) {%>
    <div class="mui-row item">
        <a href="<?php echo $this->Url->build('/website/items/detail/');?><%= it.item.id %>">
            <div>
                <img class="item-img" src="<?php echo $this->request->base ;?>/<%= it.item.image %>" />
                <div class="item-tex">
                    <span class="text01"><%= it.item.name %></span>
                    <img class="btn-02" src='<?php echo $this->request->base; ?>/img/<%=it.item.state%>.png' />
                    <p class="text02">项目详情:<%= it.item.intro %></p>
                </div>
                <span class="arrow">&gt;</span>
            </div>
        </a>
    </div>
    <% })} %>
</script>
<?php
$this->start('afterScript');
?>
<script type="text/javascript" src="<?php echo $this->request->base; ?>/js/main.js"></script>
<script type="text/javascript" src="<?php echo $this->request->base; ?>/layer/layer.js"></script>
<script type="text/javascript">
    $(function() {
        var index;
        var state = "<?php isset($state) ? $state : null ?>";
        var areaId = "<?php isset($areaId) ? $state : null ?>";
        var data = {};
        if (state) {
            data.state = state;
        }
        if (areaId) {
            data.areaId = areaId;
        }
        //var data = state ? {'state':state} : {};
        $('#areaId').change(function(){
            var data = {areaId: $(this).val(), state: $('#state').val()};
            pageParam.areaId = $(this).val();
            getItemData(data);
        });

        $('#state').change(function(){
            var data = {areaId: $('#areaId').val(), state: $(this).val()};
            pageParam.state = $(this).val();
            getItemData(data);
        });

        function getItemData(data) {
            //ajax获取数据
            $.ajax({
                url: baseUrl + '/website/items/lists',
                type: 'post',
                data: data,
                dataType: 'json',
                beforeSend: function(xmlHttpRequest) {
                    index = layer.load(1, {
                        shade: [0.1,'#fff'] //0.1透明度的白色背景
                    });
                },
                complete: function(xmlHttpRequest) {
                    layer.close(index);
                },
                success: function(data, textStatus) {
                    a = data.items;
                    console.log(a);
                    var b = _.template($('#tpl_items_lists').html(), {
                            dataset: a
                        }),
                        e = $(b);
                    $('#list').html(e);
                }
            });
        }

        initLoadMore({
            targetSelector: '#list',
            data: data,
            tpl: $('#tpl_items_lists').html(),
            prefix: 'items'
        });
    });

</script>
<?php
$this->end();
?>