<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-12">
            <form action="{{ route('sentences.store') }}" method="post">
                @csrf
                @method('post')

                <div class="row">
                    <div class="col-6">
                        <input type="text" name="text" class="form-control">
                    </div>

                    <div class="col-6">
                        <input type="text" name="translate" class="form-control">
                    </div>
                </div>

                <input type="submit" value="add">
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-stripped">
                @foreach(\App\Models\Sentence::orderBy('id', 'desc')->get() as $sentence)
                    <tr>
                        <td>{{ $sentence->text }}</td>
                        <td>{{ $sentence->translate }}</td>
                        <td>
                            <form action="{{ route('sentences.destroy', $sentence->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="del">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


</div>

<script src="/js/app.js"></script>
</body>
</html>
