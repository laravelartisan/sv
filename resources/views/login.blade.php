<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="_token" content="{!! csrf_token() !!}"/>
<title>Document</title>
</head>
<body>

  <div class="secure">Secure Login form</div>
  {!! Form::open(array('url'=>'account/login','method'=>'POST', 'id'=>'myform')) !!}
  <div class="control-group">
    <div class="controls">
       {!! Form::text('email','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Email')) !!}
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
    {!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
    </div>
  </div>
  {!! Form::button('Login', array('class'=>'send-btn')) !!}
  {!! Form::close() !!}


  {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') !!}

  {{--<script type="text/javascript">
  $(document).ready(function(){
    $('.send-btn').click(function(){
      $.ajax({
        url: 'login',
        type: "post",
        data: {'email':$('input[name=email]').val(), '_token': $('input[name=_token]').val()},
        success: function(data){
          alert(data);
        }
      });
    });
  });
  </script>--}}
  <script type="text/javascript">

  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });
    $(document).ready(function(){
      $('.send-btn').click(function(){
        $.ajax({
          url: 'login',
          type: "post",
          data: {'email':$('input[name=email]').val()},
          success: function(data){
            alert(data);
          }
        });
      });
    });
    </script>



</body>
</html>

