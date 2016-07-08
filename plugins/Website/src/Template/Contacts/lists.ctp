<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left backbtn" style="margin-left:6px;padding-top:15px;font-size: 14px;color: #000;">返回</a>
    <h1 class="mui-title">通讯录</h1>
</header>
<div class="add-book">
    <ul id="list" class="mui-table-view mui-table-view-chevron">
        <?php foreach ($contacts as $item) {?>
        <li class="mui-table-view-cell">
            <a class="mui-navigate-right book" href="tel:<?php echo $item->tel; ?>">
                <?php echo $item->name; ?>
            </a>
        </li>
        <?php } ?>
    </ul>

    <div class="loadmore">
        <span class="more-message" style="display: none">加载更多<i class="loadmore-icon"></i></span>
    </div>
    <!--
    <a href="javascript:;" class="loadmore j-loadmore">
        <span>加载更多</span>
        <i class="loadmore-icon"></i>
    </a>
    -->
</div>
<script type="text/j-template" id="tpl_items_lists">
<% if (dataset.length) { %>
<%  _.each(dataset, function(item) {%>
    <li class="mui-table-view-cell">
        <a class="mui-navigate-right book" href="tel:<%= item.tel %>">
            <%= item.name %>
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
            prefix: 'contacts'
        });
    });

</script>
<?php
    $this->end();
?>


