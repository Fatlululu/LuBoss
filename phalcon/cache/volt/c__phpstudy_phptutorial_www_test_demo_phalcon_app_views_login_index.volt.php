<div>
    <img src="../public/img/face.jpg" alt="">
    <div class="loginBody" >
        <form class="layui-form"  autocomplete="on">
            <div class="login_face"><img src="../public/img/face.jpg" class="userAvatar"></div>
            <div class="layui-form-item input-item">
                <label for="userName">用户名</label>
                <input type="text" placeholder="请输入用户名" autocomplete="off" id="adminUser" class="layui-input" lay-verify="required" value="">
            </div>
            <div class="layui-form-item input-item">
                <label for="password">密码</label>
                <input type="password" placeholder="请输入密码" autocomplete="off" id="password" class="layui-input" lay-verify="required" value="">
            </div>
            <div class="layui-form-item input-item" id="imgCode">
                <label for="code">验证码</label>
                <input type="text" placeholder="请输入验证码" autocomplete="off" id="code" class="layui-input">
    <!--            <img src="../public/img/face.jpg">-->
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-block" lay-filter="login"  id = "login" lay-submit>登录</button>

            </div>
            <div class="layui-form-item layui-row">

            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    layui.use(['form','layer','jquery'],function(){
        var form = layui.form,
            layer = parent.layer === undefined ? layui.layer : top.layer
            $ = layui.jquery;

        //登录按钮
      form.on("submit(login)",function(data){

        $(this).text("登录中...").attr("disabled","disabled");
          $.ajax({
              url: "<?= $this->url->get('login/index') ?>",
              data: {
                  adminUser: $("#adminUser").val(),
                  password: $("#password").val(),
                  code: $("#code").val(),
              },
              type: 'post',
              cache: false,
              dataType: 'json',
              success: function (data) {
                  console.log(data);
                  if(data.date == 'success'){
                      // console.log('OK:'+data.message);
                      layer.msg('登陆成功', {icon: 1, time: 2000});
                      setTimeout(function(){
                          window.location.href = "../index/index";
                      },1000);
                  }else{
                      // console.log('RAIL:'+data.message);
                      $("#login").text("登录");
                      $("#login").removeAttr("disabled");
                      layer.msg(data.msg, {icon: 2, time: 2000});
                  }
              },
              error: function () {
                  console.log('出错');
              }
          });
        });
        //表单输入效果
        $(".loginBody .input-item").click(function(e){
            e.stopPropagation();
            $(this).addClass("layui-input-focus").find(".layui-input").focus();
        })
        $(".loginBody .layui-form-item .layui-input").focus(function(){
            $(this).parent().addClass("layui-input-focus");
        })
        $(".loginBody .layui-form-item .layui-input").blur(function(){
            $(this).parent().removeClass("layui-input-focus");
            if($(this).val() != ''){
                $(this).parent().addClass("layui-input-active");
            }else{
                $(this).parent().removeClass("layui-input-active");
            }
        })
    })

</script>

