<style>
    .selectcss{
        float: left;
    }
    .icondown{
        float: left;
        padding-top: 13px;
    }
    .notread{
        color: #ff0000;
    }
    .notread .iconfont{
        color: #ff0000;
    }

    .notreadnotice{
        color: #0b33ff;
    }
    .notreadnotice .iconfont{
        color: #0b33ff;
    }
</style>
<div class="header-bg">
    <select id="area" class="selectcss">
    <?php foreach ($areas as $key => $item) {?>
        <option value="<?php echo $key ?>" data-zoom="<?php echo $item['zoom'] ?>" data-lng="<?php echo $item['longitude']; ?>" data-lat="<?php echo $item['latitude']; ?>" data-child="<?php echo json_encode($item['child']);?>"><?php echo $item['name']; ?></option>
    <?php } ?>
    </select>
    <span class="mui-icon mui-icon-arrowdown icondown"></span>
    <!--
    <select id="area">
        <option value="1" selected data-zoom="14" data-lng="117.316222" data-lat="31.800052">包河区</option>
        <option value="2" data-zoom="15" data-lng="117.307168" data-lat="31.853834">街道1</option>
        <option value="3" data-zoom="15" data-lng="117.346693" data-lat="31.829846">街道2</option>
        <option value="4" data-zoom="15" data-lng="117.333398" data-lat="31.791182">街道3</option>
        <option value="5" data-zoom="15" data-lng="117.324990" data-lat="34.76202">街道4</option>
    </select>
    -->
    <a class="news" href="<?php echo $this->request->base.'/website/notices/lists';?>">
        <span class="notreadnotice"><i class="iconfont">&#xe620;</i> <?php echo $noticeCount;?>&nbsp;&nbsp;</span>
    </a>

    <a class="news" href="<?php echo $this->request->base.'/website/notices/lists';?>">
        <span class="notread"><i class="iconfont">&#xe620;</i> <?php echo $noticeNotCount;?>&nbsp;&nbsp;</span>
    </a>
</div>
<div class="clear"></div>
<div id="itemMarker" data-value='<?php echo $items?>' style="display: none"></div>
<div id="allmap" class="map" ></div>
<div class="clear"></div>
<div class="button-01">
<?php foreach($itemState as $key => $val){
        $png = '';
        $type = '';
        switch($key) {
            case '1':
                $type = 'chai';
                $png = 'btn01.png';
                break;
            case '2':
                $type = 'suan';
                $png = 'btn02.png';
                break;
            case '3':
                $type = 'jian';
                $png = 'btn03.png';
                break;
            case '4':
                $type = 'an';
                $png = 'btn04.png';
                break;
            case '5':
                $type = 'guan';
                $png = 'btn05.png';
                break;
        }
    ?>
    <!--
    <a class="btn-01" href="<?php echo $this->Url->build('/website/items/lists?state=' . $key);?>">
    -->
    <a href="javascript:;" class="btn-01" data-state="<?php echo $key;?>">
        <span class="numb" id="<?php echo $type?>">0</span>
        <img class="btn-img" src="<?php echo $this->request->base; ?>/img/<?php echo $png; ?>" />
    </a>
<?php } ?>
<?php $this->start('afterScript'); ?>
<!--
<script type="text/javascript" src="http://api.map.baidu.com/api?type=quick&ak=rsr0EEvF3VN9x5bUOAOseqmGnUefs4AE&v=1.0"></script>
-->
    <script>
        $(function (){
            var mapHeight = $(window).height()-186 + 'px';
            $('#allmap').css('height', mapHeight);
        })

    </script>
<script type="text/javascript" src="<?php echo $this->request->base; ?>/layer/layer.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=rsr0EEvF3VN9x5bUOAOseqmGnUefs4AE"></script>
<script type="text/javascript" src="<?php echo $this->request->base?>/js/map.js?v=5"></script>
<?php $this->end('afterScript'); ?>
