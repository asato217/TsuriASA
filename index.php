<?php
// 現在の年月を取得
$year = date('Y');
$month = date('n');
// 月末日を取得
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
//date('引数', mktime(0,       //時
//                   0,       //分
//                   0,       //秒
//                   $month + 1,  //月(翌月)
//                   0,       //日(0を指定すると前月の末日)
//                   $year   //年
//                   ));

$calendar = array();
$j = 0;
// 月末日までループ
for ($i = 1; $i < $last_day + 1; $i++) {
    // 曜日を取得
    $week = date('w', mktime(0, 0, 0, $month, $i, $year));
    // 1日の場合
    if ($i == 1) {
        // 1日目の曜日までをループ
        for ($s = 1; $s <= $week; $s++) {
            // 前半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
         }
     }
    // 配列に日付をセット
    $calendar[$j]['day'] = $i;
    $j++;
    // 月末日の場合
    if ($i == $last_day) {
        // 月末日から残りをループ
        for ($e = 1; $e <= 6 - $week; $e++) {
            // 後半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
         }
     }
 }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="icon" href="img/favicon.ico">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="eyecatch">
                    <h1>TsuriASA</h1>
                    <div class="menu">
                        <ul id="menu">
                            <li><a href="">About</a></li>
                            <li><a href="">Boats</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container clear">
                <div id="left">
                    <div class="tab-content">
                        <input type="radio" id="tab1" name="tab" checked >
                        <label for="tab1">New!</label>
                        <input type="radio" id="tab2" name="tab">
                        <label for="tab2">TaidGraph</label>
                        <input type="radio" id="tab3" name="tab">
                        <label for="tab3">Resurve</label>
                        <div class="tab-box">
                            <div id="tabView1">
                                コンテンツ1の内容が表示されます。コンテンツ1の内容が表示されます。
                            </div>
                            <div id="tabView2">
                                コンテンツ2の内容が表示されます。コンテンツ2の内容が表示されます。
                            </div>
                            <div id="tabView3">
                                コンテンツ3の内容が表示されます。コンテンツ3の内容が表示されます。
                            </div>
                        </div>
                    </div>
                </div>
                <div id="right">
                    <div id="calender">
                        <?php echo $year; ?>年<?php echo $month; ?>月のカレンダー
                        <br>
                        <br>
                        <table>
                            <tr>
                                <th>日</th>
                                <th>月</th>
                                <th>火</th>
                                <th>水</th>
                                <th>木</th>
                                <th>金</th>
                                <th>土</th>
                            </tr>

                            <tr>
                            <?php $cnt = 0; ?>
                            <?php foreach ($calendar as $key => $value): ?>

                                <td>
                                <?php $cnt++; ?>
                                <?php echo $value['day']; ?>
                                </td>

                            <?php if ($cnt == 7): ?>
                            </tr>
                            <tr>
                            <?php $cnt = 0; ?>
                            <?php endif; ?>

                            <?php endforeach; ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="container">
                footer
            </div>
        </footer>
    </body>
</html>
