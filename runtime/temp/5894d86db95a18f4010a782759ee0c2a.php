<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"D:\phpstudy_pro\WWW\tpexample\public/../application/admin\view\import\log\add.html";i:1596175712;s:72:"D:\phpstudy_pro\WWW\tpexample\application\admin\view\layout\default.html";i:1588765311;s:69:"D:\phpstudy_pro\WWW\tpexample\application\admin\view\common\meta.html";i:1588765311;s:71:"D:\phpstudy_pro\WWW\tpexample\application\admin\view\common\script.html";i:1588765311;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/public/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/public/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/public/assets/js/html5shiv.js"></script>
  <script src="/public/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !\think\Config::get('fastadmin.multiplenav')): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Table'); ?>:</label>
        <div class="col-xs-12 col-sm-8" id="selectable">
            <?php echo Form::select('row[table]', $tableList, '', []); ?>
            <span id="helpBlock" class="help-block">可导入表请到该插件配置里设置</span>
        </div>
    </div>
    <div class="hidden">
        <div class="form-group">
            <label class="control-label col-xs-12 col-sm-2"><?php echo __('NewTable'); ?>:</label>
            <div class="col-xs-12 col-sm-8">
                <input id="c-newtable" class="form-control" name="row[newtable]" placeholder="不新建則留空，不需要前缀" type="text">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Row'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-row" class="form-control" name="row[row]" type="number" value=2>
            <span id="helpBlock" class="help-block">该行的上一行为匹配行</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Head_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8" id="selecthead_type">
            <?php echo Form::select('row[head_type]', ['comment'=>'注释', 'name'=>'字段名'], 'comment', ['data-rule'=>'required']); ?>
            <span id="helpBlock" class="help-block"></span>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('path'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo Form::upload('row[path]', '', ['data-rule'=>'required']); ?>
        </div>
    </div>
    <input id="step" type="hidden" name="row[step]" type="number" value=0>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <div class="hidden"><button type="submit" id="submit" class="btn btn-success btn-embossed"><?php echo __('预览'); ?></button></div>
            <button id="import" class="btn btn-success" style="display:none"><?php echo __('开始导入'); ?></button>
        </div>
    </div>
</form>

<div class="panel-heading" style="padding:10px 0">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#one" data-value="" data-toggle="tab"><?php echo __('匹配结果'); ?></a></li>
        <li class=""><a href="#two" data-value="" data-toggle="tab"><?php echo __('数据预览'); ?></a></li>
    </ul>
</div>
<div  class="tab-content">
    <div class="tab-pane fade active in" id="one">
        <div class="widget-body no-padding">
            <table id="tableField" class="table table-striped table-bordered table-hover table-nowrap" width="100%">
            </table>


        </div>
    </div>

    <div class="tab-pane fade" id="two">
        <div class="widget-body no-padding">

            <table id="table" class="table table-striped table-bordered table-hover table-nowrap" width="100%">
            </table>
        </div>
    </div>

</div>




<style>
    select.input-sm {
        height: 28px;
        line-height: 15px;
    }
    .popover-content {
        padding: 9px 29px;
    }
</style>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/public/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/public/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>
    </body>
</html>