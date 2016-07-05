<div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/articles/index" method="post">
        <input type="hidden" name="pageSize" value="<?php echo $numPerPage ?>">
        <input type="hidden" name="pageCurrent" value="1">
        <div class="bjui-searchBar">
            <label>栏目：</label>
            <select name="column_id" id="j_custom_column" data-toggle="selectpicker">
                <option value="">请选择</option>
                <?php
                foreach($columnData as $item) {
                    ?>
                    <option value="<?php echo $item->id;?>" <?php if(isset($column_id) && $column_id == $item->id){echo 'selected';}?> >
                        <?php
                        if($item->level > 1) {
                            $line = '';
                            for($i = 1; $i <= ($item->level-1); $i++){
                                $line .= "&nbsp;&nbsp;&nbsp;|---";
                            }
                            $item->name = $line.$item->name;
                            $line = '';
                        }
                        echo $item->name;
                        ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            &nbsp;&nbsp;
            <label>标题：</label>
            <input type="text" value="<?php if (isset($title)) echo $title; ?>" name="title" class="form-control" size="15">&nbsp;&nbsp;
            &nbsp;&nbsp;
            <label>发布日期：</label>
            <input type="text" value="<?php if (isset($pubdate)) echo $pubdate; ?>" name="pubdate" data-toggle="datepicker" class="form-control" size="15">&nbsp;&nbsp;
            &nbsp;&nbsp;
            <button type="submit" class="btn-default" data-icon="search">查询</button>
            &nbsp;&nbsp;
            <a class="btn btn-orange" href="javascript:;" onclick="$(this).navtab('reloadForm', true);" data-icon="undo">清空查询</a>
        </div>
    </form>

    <div class="datagrid-toolbar">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/articles/add" class="btn btn-green" data-toggle="navtab" data-id="content" data-mask="true" data-icon="plus">添加文章</a>
        </div>

        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/articles/batchdel" class="btn btn-blue" data-icon="remove" data-toggle="doajaxchecked" data-confirm-msg="确定要删除选中项吗？" data-idname="delids" data-group="ids">批量删除</a>
        </div>
    </div>
</div>

<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top" data-width="100%" data-layout-h="0" data-nowrap="true" data-selected-multi="true">
        <thead>
        <tr>
            <th width="50" align="center"><input type="checkbox" class="checkboxCtrl" data-group="ids" data-toggle="icheck"></th>
            <th align="center">ID</th>
            <th>标题</th>
            <th align="center">发布时间</th>
            <th align="center">所属栏目</th>
            <th align="center">点击</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($data as $item) { ?>
            <tr >
                <td align="center"><input type="checkbox" name="ids" data-toggle="icheck" value="<?php echo $item->id;?>"></td>
                <td align="center"><?php echo $item->id;?></td>
                <td>
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/articles/edit/<?php echo $item->id;?>" style="text-decoration:underline;" data-title="编辑文章" data-toggle="navtab" data-fresh="true" data-id="editcontent" data-mask="true"><?php echo $item->title;?></a>
                </td>
                <td align="center"><?php echo date('Y-m-d H:i:s', strtotime($item->created));?></td>
                <td align="center"><?php echo $columnArr[$item->column_id];?></td>
                <td align="center"><?php echo $item->click;?></td>
                <td>
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/articles/edit/<?php echo $item->id;?>" class="btn btn-green" data-toggle="navtab" data-fresh="true" data-id="editcontent" data-mask="true" data-title="编辑文章">编辑</a>&nbsp;
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/articles/delete/<?php echo $item->id;?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>
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