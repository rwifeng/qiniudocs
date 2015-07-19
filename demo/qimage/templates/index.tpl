<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/demo/imageclipper/css/bootstrap.min.css"/>
    <script src="/demo/imageclipper/js/jquery.min.js"></script>
    <script src="/demo/imageclipper/js/bootstrap.min.js"></script>
    <title>Image Clipper</title>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">数据访问信息</h4>
            </div>
            <form action="/demo/imageclipper/index.php?login" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ak">AccessKey</label>
                        <input type="text" class="form-control" id="ak" name="ak" placeholder="Access key" value="{$ak}">
                        <span id="helpBlock1" class="help-block">AK/SK可以在<a href="https://portal.qiniu.com/setting/key" target="_blank">密钥管理</a>页面获取。 </span>
                    </div>
                    <div class="form-group">
                        <label for="sk">SecretKey</label>
                        <input type="text" class="form-control" id="sk" name="sk" placeholder="Secret key" value="{$sk}">
                    </div>
                    <div class="form-group">
                        <label for="bucket">空间</label>
                        <input type="text" class="form-control" id="bucket" name="bucket" placeholder="空间" value="{$bucket}">
                        <span id="helpBlock2" class="help-block">请在<a href="https://portal.qiniu.com/" target="_blank">管理平台</a>确认填写的空间已存在，且已包含若干张jpg格式的图片。 </span>
                    </div>
                    <div class="form-group">
                        <label for="domain">域名</label>
                        <input type="text" class="form-control" id="domain" name="domain" placeholder="域名" value="{$domain}">
                        <span id="helpBlock2" class="help-block">请在<a href="https://portal.qiniu.com/" target="_blank">空间设置</a>中查看域名。 </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="summit" class="btn btn-primary">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ImageClipper <small>图片处理示例</small></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://qiniu.sinaapp.com/docs/php-sdk/quick-start.html" target="_blank">快速开发指南</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">帐号信息<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="https://portal.qiniu.com/setting/key" target="_blank">公钥: {$ak}</a> </li>
                        <li><a href="https://portal.qiniu.com/setting/key" target="_blank">私钥: {$sk}</a></li>
                        <li><a href="https://portal.qiniu.com/bucket/qiniudemo/resource#1" target="_blank">空间: {$bucket}</a></li>
                        <li><a href="https://portal.qiniu.com/setting/key" target="_blank">域名: {$domain}</a></li>
                        <li class="divider"></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModal">更换帐号</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-3">

            <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">上传图片</button> -->

            <div class="list-group">

                {section name="fn" loop=$pics}  
                <a href="index.php?sn={$pics[fn]['key']}" class="list-group-item{if {$sn} == {$pics[fn]['key']}} active{/if}">
                    <div class="thumbnail">
                        <img src="http://{$domain}/{$pics[fn]['key']}?imageView2/1/w/200/h/100" alt="{$pics[fn]['key']}"/>
                        <div class="caption">
                            <p>{$pics[fn]['key']}</p>
                        </div>
                    </div>
                </a>
                {/section}

            </div>
        </div>
        <div class="col-sm-9">
            <div class="thumbnail">
                <div>
                    <h5>{$pics[0]['key']}</h5>
                </div>
                <hr>
                <form class="form-inline" action="index.php?fop" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div>
                            <label class="control-label">图片处理模式:</label>

                            <select class="form-control" id="mode" name="mode" datastyle="btn-default">
                                <option role="presentation" role="menuitem" tabindex="-1" value="0" {if $mode == 0}selected="selected"{/if}><a href="#">设定最大长短边缩放</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="1" {if $mode == 1}selected="selected"{/if}><a href="#">设定最小宽高缩放，居中裁剪</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="2" {if $mode == 2}selected="selected"{/if}><a href="#">设定最大宽高缩放</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="3" {if $mode == 3}selected="selected"{/if}><a href="#">设定最小宽高缩放</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="4" {if $mode == 4}selected="selected"{/if}><a href="#">设定最小长短边缩放</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="5" {if $mode == 5}selected="selected"{/if}><a href="#">设定最小长短边缩放，居中裁剪</a></li>
                            </select>

                            <input type="text" class="form-control" id="width" name="width" placeholder="宽度（长边）" value="{$width}"/>
                            <input type="text" class="form-control" id="height" name="height" placeholder="高度（短边）"  value="{$height}"/>
                            <a href="http://developer.qiniu.com/docs/v6/api/reference/fop/image/imageview2.html" target="_blank">参数说明</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">操作图片</button>
                </form>
                <hr>
                {if count($pics) > 0}
                    <img src="http://{$domain}/{$sn}{if isset($mode)}?imageView2/{$mode}{if isset($width)}/w/{$width}{/if}{if isset($height)}/h/{$height}{/if}{/if}" alt="{$sn}"/>
                {/if}
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr><th>属性</th><th>值</th></tr>
                        {foreach from=$props key=k item=v}  
                        <tr><td>{$k}</td><td>{$v}</td></tr>
                        {/foreach}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>