<div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/items/index" method="post">
        <input type="hidden" name="pageSize" value="<?php echo $numPerPage ?>">
        <input type="hidden" name="pageCurrent" value="1">
        <div class="bjui-searchBar">
            <label>项目名称：</label>
            <input type="text" value="<?php if (isset($name)) echo $name; ?>" name="name" class="form-control" size="15">&nbsp;&nbsp;
            &nbsp;&nbsp;
            <label>项目状态：</label>
            <select name="state" id="j_custom_column" data-toggle="selectpicker">
                <option value="">请选择</option>
                <?php
                    foreach($itemStateData as $key => $val) {
                        ?>
                        <option value="<?php echo $key;?>" <?php if(isset($state) && $state == $key){echo 'selected';}?> >
                            <?php
                                echo $val;
                            ?>
                        </option>
                        <?php
                    }
                ?>
            </select>
            &nbsp;&nbsp;
            <label>完成状态：</label>
            <select name="ok" id="j_custom_ok" data-toggle="selectpicker">
                <option value="">请选择</option>
                <?php
                    foreach($stateOkData as $key => $val) {
                        ?>
                        <option value="<?php echo $key;?>" <?php if(isset($ok) && $ok == $key){echo 'selected';}?> >
                            <?php
                            echo $val;
                            ?>
                        </option>
                        <?php
                    }
                ?>
            </select>
            <button type="submit" class="btn-default" data-icon="search">查询</button>
            &nbsp;&nbsp;
            <a class="btn btn-orange" href="javascript:;" onclick="$(this).navtab('reloadForm', true);" data-icon="undo">清空查询</a>
        </div>
    </form>

    <div class="datagrid-toolbar">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/items/add" class="btn btn-green" data-toggle="dialog" data-width="900" data-height="750" data-mask="true" data-icon="plus">添加项目</a>
        </div>

        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/items/batchdel" class="btn btn-blue" data-icon="remove" data-toggle="doajaxchecked" data-confirm-msg="确定要删除选中项吗？" data-idname="delids" data-group="ids">批量删除</a>
        </div>
    </div>
</div>

<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top" data-width="100%" data-layout-h="0" data-nowrap="true" data-selected-multi="true">
        <thead>
        <tr>
            <th width="50" align="center"><input type="checkbox" class="checkboxCtrl" data-group="ids" data-toggle="icheck"></th>
            <th align="center">项目id</th>
            <th>项目名称</th>
            <th align="center">面积</th>
            <th align="center">拆迁户数</th>
            <th>建设单位</th>
            <th align="center">建设周期</th>
            <th align="center">开始日期</th>
            <th align="center">项目状态</th>
            <th align="center">完成状态</th>
            <th>项目进度</th>
            <th align="center">创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($data as $item) { ?>
            <tr >
                <td align="center"><input type="checkbox" name="ids" data-toggle="icheck" value="<?php echo $item->id;?>"></td>
                <td align="center"><?php echo $item->id;?></td>
                <td>
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/items/edit/<?php echo $item->id;?>" style="text-decoration:underline;" data-title="编辑" data-toggle="dialog" data-width="900" data-height="750" data-fresh="true" data-id="editcontent" data-mask="true"><?php echo $item->name;?></a>
                </td>
                <td align="center"><?php if(!empty($item->mianji)){echo $item->mianji.'㎡';}?></td>
                <td align="center"><?php echo $item->households;?></td>
                <td><?php echo $item->construction;?></td>
                <td align="center"><?php echo $item->period;?></td>
                <td align="center"><?php if(!empty($item->starttime)) {echo date('Y-m-d', strtotime($item->starttime));}?></td>
                <td align="center">
                    <span class="label" style="padding-left:10px;padding-right: 10px;background: <?php echo $stateColorData[$item->state];?>"><?php echo $itemStateData[$item->state];?></span>
                </td>
                <td align="center"><font color="<?php echo $okColorData[$item->ok];?>"><?php echo $stateOkData[$item->ok];?></font></td>
                <td><?php echo $item->currentParentName; if(!empty($item->currentChildName)) {echo ' > '. $item->currentChildName;} ?></td>
                <td align="center"><?php echo $item->created->format('Y-m-d H:i:s'); ?></td>
                <td>
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/items/edit/<?php echo $item->id;?>" class="btn btn-green" data-toggle="dialog" data-width="900" data-height="750" data-mask="true" data-title="编辑">编辑</a>&nbsp;
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/items/delete/<?php echo $item->id;?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>&nbsp;
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/index/<?php echo $item->id;?>" class="btn btn-blue" data-toggle="navtab" data-id="flowdetails" data-mask="true" data-fresh="true" data-title="<?php echo $item->name;?> 项目流程">项目流程</a>&nbsp;
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/notices/index/<?php echo $item->id;?>" class="btn btn-orange" data-toggle="navtab" data-id="notices" data-icon="fa-bell-o" data-fresh="true" data-mask="true" data-title="<?php echo $item->name;?> 项目提醒">项目提醒</a>&nbsp;
                </td>
            </tr>
            <?php $i++; } ?>
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