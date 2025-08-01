<?php
// 初始化变量
$showSuccess = false;
$showError = false;

// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {
    $content = $_POST['content'];
    $filePath = 'fh.txt';
    
    if (file_put_contents($filePath, $content) !== false) {
        $showSuccess = true;
    } else {
        $showError = true;
    }
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>支付宝防红链接更新</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        :root {
            --primary-color: #C5C1FF;
            --hover-color: #C5C1FF;
            --bg-color: #f8fafc;
            --text-color: #1a1a1a;
            --border-color: #e5e7eb;
        }

        body {
            background: var(--bg-color);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: var(--text-color);
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
            width: 100%;
            max-width: 420px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .form-header i {
            font-size: 56px;
            background: linear-gradient(-225deg, #2CD8D5 0%, #C5C1FF 56%, #FFBAC3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            display: inline-block;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .form-header h1 {
            font-size: 28px;
            color: var(--text-color);
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 24px;
        }

        textarea {
            width: 100%;
            padding: 16px;
            border: 2px solid var(--border-color);
            border-radius: 16px;
            min-height: 150px;
            resize: vertical;
            font-size: 16px;
            background: #fafafa;
        }

        textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
        }

        button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(-225deg, #2CD8D5 0%, #C5C1FF 56%, #FFBAC3 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        button:hover {
            transform: translateY(-2px);
        }

        .status-message {
            margin-top: 16px;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            display: none;
        }

        .success {
            background-color: #f0fff4;
            color: #38a169;
        }

        .error {
            background-color: #fff5f5;
            color: #e53e3e;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }
            .form-header i {
                font-size: 48px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <i class="fab fa-alipay"></i>
            <h1>支付宝防红链接更新</h1>
            <p>输入接口内容</p>
        </div>

        <form method="post">
            <div class="form-group">
                <textarea name="content" placeholder="请输入新的接口内容" required></textarea>
            </div>
            <button type="submit">
                <i class="fas fa-save"></i>
                替换接口
            </button>
        </form>

        <div id="successMessage" class="status-message success" style="display: <?php echo $showSuccess ? 'block' : 'none'; ?>;">
            接口更新成功
        </div>

        <div id="errorMessage" class="status-message error" style="display: <?php echo $showError ? 'block' : 'none'; ?>;">
            接口更新失败
        </div>
    </div>
</body>
</html>
