function onClickProductX() {
    // 30から100の間で乱数を発生
    let min = 30;
    let max = 100;
    let random = Math.floor( Math.random() * (max + 1 - min) ) + min ;

    let showX = document.getElementById("showX");
    showX.textContent = random;
}


function onClickCoin() {
    // 1もしくは2のどちらかの数字を発生
    let min = 1;
    let max = 2;
    let random = Math.floor( Math.random() * (max + 1 - min) ) + min ;
    // メッセージを格納するための変数を用意
    let msg;

    if (random == 1) {
        msg = "あなたが先行です！";
    } else {
        msg = "PCが先行です！";
    }

    // playerとPCのどちらが先行かを出力
    let coinResult = document.getElementById("coinResult");
    coinResult.textContent = msg;

    // playerが先行の場合
    if (msg == "あなたが先行です！") {
        // submitAreaのみを表示
        const submitArea = document.getElementById("submitArea");
        submitArea.style.display = "block";
        const sum = document.getElementById("sum");
        sum.style.display = "block";
        const recieveArea = document.getElementById("recieveArea");
        recieveArea.style.display = "none";
    }

    // PCが先行の場合の処理
    if (msg == "PCが先行です！") {
        // recieveAreaのみを表示
        const recieveArea = document.getElementById("recieveArea");
        recieveArea.style.display = "block";
        const sum = document.getElementById("sum");
        sum.style.display = "block";
    }
}


function onClickSubmit() {
    let showX = document.getElementById("showX");
    let setNumber = document.getElementById("number").value;
    let currentSum = document.getElementById("currentSum");

    // 文字列から数値に変換
    setNumber = parseInt(setNumber);

    // setNumberが1以上5以下の整数であるかを確認
    if (Number.isInteger(setNumber) && setNumber >= 1 && setNumber <= 5) {
        // 現在の合計に加算
        let sumNumber = parseInt(currentSum.textContent) + setNumber;
        
        if (sumNumber <= parseInt(showX.textContent)) {
            // ゲーム続行
            currentSum.textContent = sumNumber;
        } else {
            // ゲーム終了
            alert("合計値が「X」]を超えました。あなたの負けです。");
        }
        // recieveAreaに切り替え
        const submitArea = document.getElementById("submitArea");
        submitArea.style.display = "none";
        const recieveArea = document.getElementById("recieveArea");
        recieveArea.style.display = "block";
        

    } else {
        // 不正な入力の場合、メッセージを表示または処理を行う
        alert("1から4までの整数ではない値が入力されました。やり直してください。");
    }

    
}


function onClickRecieve() {
    let showX = document.getElementById("showX");
    let pushNumber = Math.floor(Math.random() * 5) + 1;
    let currentSum = document.getElementById("currentSum");
    let sumNumber = parseInt(currentSum.textContent) + pushNumber;

    if (sumNumber <= parseInt(showX.textContent)) {
        // ゲーム続行
        currentSum.textContent = sumNumber;
    } else {
        // ゲーム終了
        alert("合計値が「X」を超えました。あなたの勝ちです。");

        // セーブ処理
        const savePoint = document.getElementById("savePoint");
        savePoint.style.display = "block";

        let winningPointInput = document.getElementById("winningPoint");
        let pointSpan = document.getElementById("showX");
        let point = pointSpan.textContent;
        winningPointInput.value = point;
    }
    
    // submitAreaに切り替え
    const submitArea = document.getElementById("submitArea");
    submitArea.style.display = "block";
    const recieveArea = document.getElementById("recieveArea");
    recieveArea.style.display = "none";
}

