<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>カウントゲーム</title>
        <link href="countGame.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <article>
            <header>
                <div class="logo">
                    <img src="countX_logo.jpg" alt="Logo">
                    <h1><a href="countGame.php">カウントX</a></h1>
                </div>
                <div id="user-info">
                    <?php
                        session_start();
                        if (isset($_SESSION['username']) && isset($_SESSION['point'])) {
                            echo '<span id="username">ユーザ名：' . $_SESSION['username'] . '</span>';
                            echo '<span id="point">ポイント：' . $_SESSION['point'] . '</span>';
                        }
                    ?>
                </div>
            </header>
            <section>
                <p>
                    今からPCとゲームをしてもらいます。やってもらうゲームの名前は、<strong>カウントX</strong>です。<br>
                    あなたとPCが順番に1~5までの数字を提示します。両者が提示した数字の合計が数字「X」を超えてしまった方が負けとなります。<br>
                    それでは、ゲームを始めましょう！
                </p>
            </section>
            <section>
                <p>
                    まずは、ゲームで使う数字「X」を決めます。<br>
                    Xは30~100までのいずれかの整数です。Xを決めるために、ボタンを押してください。<button id="productX" type="button" onclick="onClickProductX()">ボタン</button><br>
                    Xの値は...<br>
                    <div id="showX"></div>
                </p>
            </section>
            <section>
                <p>
                    次は、ゲームの先攻後攻を決めます。<br>
                    ゲームの先攻後攻を決めるためにコインを振ってもらいます。ボタンを押してください。<button id="coin" type="button" onclick="onClickCoin()">ボタン</button><br>
                    コインを振った結果は...<br>
                    <div id="coinResult"></div>
                </p>
            </section>
            <section>
                <p>
                    <div id="submitArea">
                        1~5までの整数の中から、1つ整数を入力して送信してください。（入力は小文字でお願いします。）<br>
                        <input id="number" type="text">&nbsp;<button id="submit" type="button" onclick="onClickSubmit()">送信</button>
                    </div>
                    <div id="recieveArea">
                        PCが選んだ数値を受信してください。&nbsp;<button id="recieve" type="button" onclick="onClickRecieve()">受信</button>
                    </div>
                    <div id="sum">
                        現在の合計値は...<div id="currentSum">0</div>
                    </div>
                </p>
                <p>
                    <div id="savePoint">
                        あなたの勝ちです。今回の結果をセーブしますか？<br>
                        <form action="dataHandling.php" method="POST">
                            <div class="save-group">
                                <label for="number">Point&nbsp;:</label>
                                <input type="number" id="winningPoint" name="winningPoint" required>
                            </div>
                            <button class="save" type="submit">セーブ</button>
                        </form>
                    </div>
                </P>
            </section>
        </article>
        <script type="text/javascript" src="countGame.js"></script>
    </body>
</html>
