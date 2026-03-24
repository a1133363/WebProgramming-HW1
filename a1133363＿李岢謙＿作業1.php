<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>夏令營報名表</title>
</head>
<body>
    <h1>夏令營報名表</h1>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '<h2>報名資料</h2>';
        echo '<p>姓名：' . $_POST['name'] . '</p>';
        echo '<p>性別：' . $_POST['gender'] . '</p>';
        echo '<p>生日：' . $_POST['birthday'] . '</p>';
        echo '<p>年齡：' . $_POST['age'] . '</p>';
        echo '<p>電子郵件：' . $_POST['email'] . '</p>';
        echo '<p>聯絡電話：' . $_POST['phone'] . '</p>';
        echo '<p>地址：' . $_POST['address'] . '</p>';
        echo '<p>營隊類型：' . $_POST['camp_type'] . '</p>';
        echo '<p>報名梯次：' . $_POST['session'] . '</p>';
        echo '<p>餐點需求：' . $_POST['meal'] . '</p>';
        echo '<p>緊急聯絡人：' . $_POST['emergency_contact'] . '</p>';
        echo '<p>緊急聯絡電話：' . $_POST['emergency_phone'] . '</p>';
        echo '<p>健康狀況：' . $_POST['health_condition'] . '</p>';
        echo '<p>特殊需求：' . $_POST['special_needs'] . '</p>';
        echo '<hr>';
    }
    ?>
    
    <form method="POST" action="">
        <h3>基本資料</h3>
        
        <label>姓名：</label>
        <input type="text" name="name" required>
        <br><br>
        
        <label>性別：</label>
        <input type="radio" name="gender" value="男" required> 男
        <input type="radio" name="gender" value="女" required> 女
        <input type="radio" name="gender" value="其他" required> 其他
        <br><br>
        
        <label>生日：</label>
        <input type="date" name="birthday" required>
        <br><br>
        
        <label>年齡：</label>
        <input type="number" name="age" min="6" max="18" required>
        <br><br>
        
        <label>電子郵件：</label>
        <input type="email" name="email" required>
        <br><br>
        
        <label>聯絡電話：</label>
        <input type="tel" name="phone" required>
        <br><br>
        
        <label>地址：</label>
        <input type="text" name="address" required>
        <br><br>
        
        <h3>營隊選擇</h3>
        
        <label>營隊類型：</label>
        <select name="camp_type" required>
            <option value="">請選擇</option>
            <option value="程式設計營">程式設計營</option>
            <option value="科學探索營">科學探索營</option>
            <option value="運動挑戰營">運動挑戰營</option>
            <option value="藝術創作營">藝術創作營</option>
            <option value="英語戲劇營">英語戲劇營</option>
            <option value="戶外冒險營">戶外冒險營</option>
        </select>
        <br><br>
        
        <label>報名梯次：</label>
        <select name="session" required>
            <option value="">請選擇</option>
            <option value="第一梯次 (7/1-7/5)">第一梯次 (7/1-7/5)</option>
            <option value="第二梯次 (7/8-7/12)">第二梯次 (7/8-7/12)</option>
            <option value="第三梯次 (7/15-7/19)">第三梯次 (7/15-7/19)</option>
            <option value="第四梯次 (7/22-7/26)">第四梯次 (7/22-7/26)</option>
            <option value="第五梯次 (8/5-8/9)">第五梯次 (8/5-8/9)</option>
            <option value="第六梯次 (8/12-8/16)">第六梯次 (8/12-8/16)</option>
        </select>
        <br><br>
        
        <label>興趣活動（可複選）：</label><br>
        <input type="checkbox" name="activities[]" value="游泳"> 游泳
        <input type="checkbox" name="activities[]" value="爬山"> 爬山
        <input type="checkbox" name="activities[]" value="手作DIY"> 手作DIY
        <input type="checkbox" name="activities[]" value="遊戲"> 遊戲
        <input type="checkbox" name="activities[]" value="烹飪"> 烹飪
        <input type="checkbox" name="activities[]" value="攝影"> 攝影
        <br><br>
        
        <label>餐點需求：</label>
        <select name="meal" required>
            <option value="">請選擇</option>
            <option value="葷食">葷食</option>
            <option value="素食">素食</option>
            <option value="蛋奶素">蛋奶素</option>
        </select>
        <br><br>
        
        <h3>緊急聯絡資訊</h3>
        
        <label>緊急聯絡人：</label>
        <input type="text" name="emergency_contact" required>
        <br><br>
        
        <label>緊急聯絡電話：</label>
        <input type="tel" name="emergency_phone" required>
        <br><br>
        
        <label>健康狀況：</label>
        <select name="health_condition" required>
            <option value="">請選擇</option>
            <option value="良好">良好</option>
            <option value="有過敏史">有過敏史</option>
            <option value="有慢性疾病">有慢性疾病</option>
            <option value="其他">其他</option>
        </select>
        <br><br>
        
        <label>特殊需求或備註：</label><br>
        <textarea name="special_needs" rows="5" cols="50"></textarea>
        <br><br>
        
        <button type="submit">送出報名</button>
    </form>
</body>
</html>