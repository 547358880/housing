<div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/contacts/lookup" method="post">
        <div class="bjui-searchBar">
            <label>姓名：</label>
            <input type="text" value="<?php if (isset($name)) echo $name; ?>" name="name" class="form-control" size="15">&nbsp;&nbsp;
            <label>电话:</label>
            <input type="text" value="<?php if (isset($tel)) echo $tel; ?>" name="tel" class="form-control" size="15">&nbsp;&nbsp;
            <button type="submit" class="btn-default" data-icon="search">查询</button>&nbsp;
            <a class="btn btn-orange" href="javascript:;" data-toggle="reloadsearch" data-clear-query="true" data-icon="undo">清空查询</a>&nbsp;
            <div class="pull-right">
                <input type="checkbox" name="lookupType" value="1" data-toggle="icheck" data-label="追加" checked>
                <button type="button" class="btn-blue" data-toggle="lookupback" data-lookupid="ids" data-warn="请至少选择一项职业" data-icon="check-square-o">选择选中</button>
            </div>
        </div>
    </form>
</div>
<div class="bjui-pageContent tableContent">
    <table data-toggle="tablefixed" data-width="100%">
        <thead>
        <tr>
            <th width="15%" align="center">序号</th>
            <th width="35%">名称</th>
            <th width="20%" align="center">电话</th>
            <th width="28"><input type="checkbox" class="checkboxCtrl" data-group="ids" data-toggle="icheck"></th>
            <th width="30%" align="center">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $i=1;
            if (!empty($data)) {
                foreach ($data as $item) {
                    ?>
                    <tr>
                        <td align="center"><?php echo $i;?></td>
                        <td><?php echo $item->name;?></td>
                        <td><?php echo $item->tel;?></td>
                        <td><input type="checkbox" name="ids" data-toggle="icheck" value="{id:'<?php echo $item->id;?>', name:'<?php echo $item->name;?>', tel:'<?php echo $item->tel;?>'}"></td>
                        <td align="center">
                            <a href="javascript:;" data-toggle="lookupback" data-args="{id:'<?php echo $item->id;?>', name:'<?php echo $item->name;?>', tel:'<?php echo $item->tel;?>'}" class="btn btn-blue" title="选择本项" data-icon="check">选择</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            }
        ?>
        </tbody>
    </table>
</div>
<div class="bjui-pageFooter">
    <div class="pages">
        <span>每页&nbsp;</span>
        <div class="selectPagesize">
            <select data-toggle="selectpicker" data-toggle-change="changepagesize">
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
        <span>&nbsp;条，共 <?php echo $this->Paginator->counter('{{count}}');?> 条</span>
    </div>
    <div class="pagination-box" data-toggle="pagination"
         data-total="<?php echo $this->Paginator->counter('{{count}}');?>"
         data-page-size="<?php echo $numPerPage; ?>"
         data-page-current="1">
    </div>
</div>