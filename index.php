<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>iframe</title>
    <style>
        .base-frame {
            display: flex;
            flex-direction: row;
            width: 100vw;
            height: 100vh;
        }
        .left-frame {
            width: 50%;
        }
        .right-frame {
            width: 50%;
            overflow: auto;
        }
    </style>
</head>
<body>
<div class="base-frame">
    <div class="left-frame">
        <iframe src="https://www.jma.go.jp/jma/index.html" width="100%" height="100%"></iframe>
    </div>
    <div class="right-frame">
        <iframe src="https://www.jma.go.jp/jma/index.html" width="100%" height="100%"></iframe>
    </div>
</div>
</body>
</html>
