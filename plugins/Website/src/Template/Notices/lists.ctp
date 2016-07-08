<style>
    .title{
        line-height: 20px;
    }
    .isbold{
        font-weight: bold;
    }

    .label-info {
        background-color: #5bc0de;
    }

    .label-success {
        background-color: #5cb85c;
    }

    .label-danger {
        background-color: #d9534f;
    }

    .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
    }
</style>
<?php
    if (isset($item_id) && !empty($item_id)) {
        ?>
        <div class="table">
            <div border="1" style="width: 100%;height: 40px;">
                <a class="td-text td-text02 <?php if ($this->request->params['action'] == 'detail') echo 'td-01';?>" href="<?php echo $this->Url->build('/website/items/detail/' . $item_id);?>">基本信息</a>
                <a class="td-text td-text02 <?php if ($this->request->params['action'] == 'accordion') echo 'td-01';?>" href="<?php echo $this->Url->build('/website/items/accordion/' .  $item_id); ?>">项目进度</a>
                <a class="td-text td-text02 <?php if ($this->request->params['action'] == 'lists') echo 'td-01';?>" href="<?php echo $this->Url->build('/website/notices/lists/' .  $item_id); ?>">项目提醒</a>
            </div>
        </div
        <?php
    }else{
        ?>
        <header class="mui-bar mui-bar-nav">
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left backbtn" style="margin-left:6px;padding-top:15px;font-size: 14px;color: #000;">返回</a>
            <h1 class="mui-title">我的提醒</h1>
        </header>
        <?php
    }
?>
<div class="mui-content">
    <ul id="list" class="mui-table-view mui-table-view-striped mui-table-view-condensed">
        <?php foreach ($notices as $item) {?>
        <li class="mui-table-view-cell">
            <a href="<?php echo $this->request->base.'/website/notices/info/'.$item->id;?>">
            <div class="mui-table">
                <div class="mui-table-cell mui-col-xs-10">
                    <h5 class="mui-ellipsis title isbold"><?php echo $item->text;?></h5>
                    <h5></h5>
                    <p class="mui-h6 mui-ellipsis">项目：<?php echo $item->item->name;?></p>
                    <span class="mui-h5"><?php echo $item->created;?></span>
                    <span class="label <?php echo $item->typeclass;?>"><?php echo $item->typename;?></span>
                </div>
                <div class="mui-table-cell mui-col-xs-2" style="text-align: center">
                    <span class="mui-h5" ><?php echo $item->isview;?></span>
                </div>
            </div>
            </a>
        </li>
        <?php } ?>
    </ul>

    <div class="loadmore">
        <span class="more-message" style="display: none">加载更多<i class="loadmore-icon"></i></span>
    </div>
</div>

<script type="text/j-template" id="tpl_items_lists">
    <% if (dataset.length) { %>
    <%  _.each(dataset, function(item) {%>
    <li class="mui-table-view-cell">
        <a href="<%= item.url %>">
        <div class="mui-table">
            <div class="mui-table-cell mui-col-xs-10">
                <h5 class="mui-ellipsis title isbold"><%= item.text %></h5>
                <h5></h5>
                <p class="mui-h6 mui-ellipsis">项目：<%= item.item.name %></p>
                <span class="mui-h5"><%= item.created %></span>
                <span class="label <%= item.typeclass %>"><%= item.typename %></span>
            </div>
            <div class="mui-table-cell mui-col-xs-2" style="text-align: center">
                <span class="mui-h5"><%= item.isview %></span>
            </div>
        </div>
        </a>
    </li>
    <% })} %>
</script>

<?php
$this->start('afterScript');
?>
<script type="text/javascript" src="<?php echo $this->request->base; ?>/js/main.js"></script>
<script type="text/javascript" src="<?php echo $this->request->base; ?>/layer/layer.js"></script>
<script type="text/javascript">
    $(function() {
        initLoadMore({
            targetSelector: '#list',
            tpl: $('#tpl_items_lists').html(),
            prefix: 'notices'
        });
    });

</script>
<?php
$this->end();
?>