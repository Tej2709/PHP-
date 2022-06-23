<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<br>
<body>
    <div class="container">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h2>Login</h2>
            </div>
            <div class="card-body">
                <form name="captcha-contact-us" id="captcha-contact-us" method="post" action="{{url('captcha-validation')}}">
                <div class="form-group">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Enter your Full Name" >
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="Enter your Email" >
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror form-control" placeholder="Enter your Password" >
                        @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                   
                    <div class="form-group mt-4 mb-4">
                        <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                ↻
                            </button>
                        </div>
                    </div>
             
                    <div class="form-group mb-4">
                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
    </div>
</body>

</html>