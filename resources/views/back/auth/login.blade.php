<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン| Laravel Mini CMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">ログイン</div>
                        <div class="card-body">
                            {{ Form::open(['route' => 'login']) }}
                            <div class="form-group">
                                {{ Form::label('email', 'メールアドレス') }}
                                {{ Form::email('email', null, [
                                    'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')
                                ]) }}
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::label('password', 'パスワード') }}
                                {{ Form::password('password', [
                                    'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')
                                ]) }}
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">ログイン</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>