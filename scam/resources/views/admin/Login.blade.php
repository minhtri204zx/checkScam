<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-CheckSca</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
    @import "//netdna.bootstrapcdn.com/font-awesome/3.0/css/font-awesome.css";

    html {
        background-color: #f7f0da;
        background-image: -webkit-linear-gradient(180deg, transparent 90%, #eae4cf 10%);
        background-image: -moz-linear-gradient(180deg, transparent 90%, #eae4cf 10%);
        background-image: -o-linear-gradient(180deg, transparent 90%, #eae4cf 10%);
        background-image: -ms-linear-gradient(180deg, transparent 90%, #eae4cf 10%);
        background-image: linear-gradient(180deg, transparent 90%, #eae4cf 10%);
        background-size: 5px 50px;
    }

    .box {
        margin: 20px auto;
        width: 560px;
        text-align: center;
        font-weight: bold;
    }

    .box div:first-child {
        font-size: 60px;
        margin-bottom: 20px;
        text-shadow: 0 2px 0 #c0c0c0, 0 3px #979385;
    }

    .box .input_control {
        position: relative;
        height: 100px;
    }

    .box input {
        position: relative;
        font-size: 18px;
        height: 56px;
        width: 100%;
        padding-left: 10px;
        border: 12px solid #fff;
        border-radius: 3px;
        box-shadow: inset 0 0 0 1px #c0c0c0, inset 1px 2px 0 #e6e6e6, 1px 2px 0 #c0c0c0, -1px 2px 0 #c0c0c0, 2px 3px 0 #c0c0c0, -2px 3px 0 #c0c0c0, 2px 12px 0 #c0c0c0, -2px 12px 0 #c0c0c0, 0 2px 0 3px #979797, 0 10px 0 3px #979797, -2px 15px 10px rgba(0, 0, 0, .6);
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -o-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.1s ease-in;
        -moz-transition: all 0.1s ease-in;
        -ms-transition: all 0.1s ease-in;
        -o-transition: all 0.1s ease-in;
        transition: all 0.1s ease-in;
    }

    .box label {
        position: absolute;
        top: -2px;
        right: 50px;
        width: 74px;
        height: 56px;
        color: #f3f2f1;
        text-shadow: 0 3px 1px #9e2719;
        border: 1px solid #dd684f;
        background: -webkit-linear-gradient(top, #e78d7b 0, #dd684f 72px);
        background: -moz-linear-gradient(top, #e78d7b 0, #dd684f 72px);
        background: -o-linear-gradient(top, #e78d7b 0, #dd684f 72px);
        background: -ms-linear-gradient(top, #e78d7b 0, #dd684f 72px);
        background: linear-gradient(top, #e78d7b 0, #dd684f 72px);
        box-shadow: 0 14px 0 #9c2912, 0 0 5px rgba(0, 0, 0, .3);
        -webkit-transition: all 0.1s ease-in;
        -moz-transition: all 0.1s ease-in;
        -o-transition: all 0.1s ease-in;
        -ms-transition: all 0.1s ease-in;
        transition: all 0.1s ease-in;
    }

    .box label:after {
        position: absolute;
        display: block;
        width: 74px;
        text-align: center;
        font: normal normal 30px/56px 'icomoon';
        speak: none;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
        -o-font-smoothing: antialiased;
        -ms-font-smoothing: antialiased;
        font-smoothing: antialiased;
    }

    .box input:focus {
        outline: 0 none;
        top: 2px;
        box-shadow: inset 0 0 0 1px #c0c0c0, inset 1px 2px 0 #e6e6e6, 1px 2px 0 #c0c0c0, -1px 2px 0 #c0c0c0, 1px 3px 0 #c0c0c0, -2px 3px 0 #c0c0c0, 2px 12px 0 #c0c0c0, -2px 12px 0 #c0c0c0, 0 2px 0 3px #979797, 0 10px 0 3px #979797, -2px 15px 10px rgba(0, 0, 0, .6);
    }

    .box input:focus+label {
        top: 0;
    }

    ::-webkit-input-placeholder {
        color: #d94a2d;
        font-style: italic;
    }

    .box .btn {
        position: relative;
        width: 200px;
        height: 60px;
        color: #4c6e03;
        font: bold 35px "Impact";
        text-indent: 10px;
        letter-spacing: 3px;
        text-align: left;
        margin-bottom: 20px;
        border: none;
        border-radius: 6px;
        text-shadow: -1px 2px 0 #c4e184;
        box-shadow: 1px 2px 0 #5f8214, -1px 2px 0 #5f8214, 2px 3px 0 #5f8214, -2px 3px 0 #5f8214, 2px 12px 0 #5f8214, -2px 12px 0 #5f8214, 0 2px 0 3px #304601, 0 10px 0 3px #304601, -2px 15px 10px rgba(0, 0, 0, .6);
        background: -webkit-linear-gradient(top, #c5e185, #a5c65c);
        -webkit-transition: all 0.1s ease-in;
        -moz-transition: all 0.1s ease-in;
        -o-transition: all 0.1s ease-in;
        -ms-transition: all 0.1s ease-in;
        transition: all 0.1s ease-in;
    }

    .box .btn:after {
        position: absolute;
        display: block;
        width: 36px;
        height: 36px;
        border-radius: 18px;
        background: #5f8214;
        top: 10px;
        right: 20px;
        text-indent: 5px;
        text-align: center;
        color: #b3d36e;
        text-shadow: 0 3px 0 #325207;
        box-shadow: inset 0 6px 0 #325207;
        font: normal normal 18px/40px 'icomoon';
        speak: none;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
        -o-font-smoothing: antialiased;
        -ms-font-smoothing: antialiased;
        font-smoothing: antialiased;
    }

    .box .btn:hover {
        background: -webkit-linear-gradient(top, #a2c452, #a5c65c);
        background: -moz-linear-gradient(top, #a2c452, #a5c65c);
        background: -ms-linear-gradient(top, #a2c452, #a5c65c);
        background: -o-linear-gradient(top, #a2c452, #a5c65c);
        background: linear-gradient(top, #a2c452, #a5c65c);
    }

    .box .btn:active {
        top: 2px;
        box-shadow: 1px 2px 0 #a5c65c, -1px 2px 0 #a5c65c, 1px 3px 0 #a5c65c, -2px 3px 0 #5f8214, 2px 12px 0 #5f8214, -2px 12px 0 #5f8214, 0 2px 0 3px #5f8214, 0 10px 0 3px #304601, -2px 15px 10px rgba(0, 0, 0, .6);
    }

    .box p a {
        color: #d94a2d;
        line-height: 30px;
        font-size: 14px;
    }
</style>

<body>
    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Sai tài khoản mật khẩu!",
                footer: '<a href="#">Why do I have this issue?</a>'
            });
        </script>
    @endif
    <div class="box">
        <form action="/admin-login" method="post">
            <div>Admin Login</div>
            @csrf
            <div class="input_control">
                <input type="text" name="email" id="inputName" placeholder="Tài khoản" value="{{old('email')}}">
                <label for="inputName"><i class="icon-user icon-3x"></i></label>
            </div>
            <div class="input_control">
                <input type="password" name="password" id="inputPassword" placeholder="******">
                <label for="inputName"><i class="icon-asterisk icon-3x"></i></label>
            </div>
            <div>
                <button type="submit" class="btn">LOGIN <i class="icon-key"></i></button>
            </div>
        </form>
    </div>

</body>

</html>