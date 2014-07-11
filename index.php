<?php
if( ! is_file('config.php')){
    copy('config.sample.php', 'config.php');
}
include 'config.php';
?><!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>노트북대여</title>
    <link rel="stylesheet" href="css/production.min.css"/>
</head>
<body>
<div class="container-fluid">
    <h1>노트북 대여 기록 장부</h1>
    <form role="form" action="save.php" method="post">
        <div class="form-group">
            <label for="빌려간사람">빌려간 사람</label>
            <input required type="text" class="form-control" id="빌려간사람" name="빌려간사람" placeholder="홍길동">
        </div>
        <div class="form-group">
            <label for="빌린시각">빌린시각(수정 못 함)</label>
            <input required type="text" class="form-control" id="빌린시각" name="빌린시각" value="<?=date('Y-m-d H:i:s')?>" readonly>
        </div>
        <div class="form-group">
            <label for="언제까지">언제까지</label>
            <input required type="text" class="form-control" id="언제까지" name="언제까지" placeholder="4시간 뒤">
        </div>
        <div class="form-group">
            <label for="노트북번호">노트북번호</label>
            <input required type="text" class="form-control" id="노트북번호" name="노트북번호" placeholder="1">
        </div>
        <p class="text-center"><button type="submit" class="btn  btn-lg  btn-primary">저장</button></p>
    </form>

    <?php
    $list = $db->query("SELECT * FROM list ORDER BY id DESC");
    ?>

    <h2>노트북 대여 명단</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>빌려간 사람</th>
            <th>빌린시각</th>
            <th>언제까지</th>
            <th>노트북번호</th>
            <th>반납시각</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $list->fetchObject()){ ?>
            <tr>
                <td><?=$row->id?></td>
                <td><?=$row->빌려간사람?></td>
                <td><?=$row->빌린시각?></td>
                <td><?=$row->언제까지?></td>
                <td><?=$row->노트북번호?></td>
                <td>
                    <?php
                    if($row->반납시각){
                        ?>
                        <a href="cancel-return.php?id=<?=$row->id?>"><?=$row->반납시각?></a>
                    <?php
                    }else{
                        ?>
                        <a class="btn btn-default" href="return.php?id=<?= $row->id ?>">반납</a>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <a class="btn btn-danger" href="delete.php?id=<?= $row->id ?>" onclick="return confirm('정말 삭제할까요?')">삭제</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script src="js/production.min.js"></script>
</body>
</html>