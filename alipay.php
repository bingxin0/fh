<!doctype html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>防红工具</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: MainFont, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        :root {
            --primary-color: #C5C1FF;
            --hover-color: #C5C1FF;
            --bg-color: #f8fafc;
            --text-color: #1a1a1a;
            --border-color: #e5e7eb;
        }

        @font-face {
            font-family: 'MainFont';
            src: url('/css/Font.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
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
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
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

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
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

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--text-color);
            font-weight: 500;
            font-size: 15px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            color: #6b7280;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        input[type="text"] {
            width: 100%;
            padding: 16px 16px 16px 48px;
            border: 2px solid var(--border-color);
            border-radius: 16px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        input[type="text"]:focus {
            border-color: var(--primary-color);
            outline: none;
            background: white;
        }

        input[type="text"]:focus+i {
            color: var(--primary-color);
        }

        input[type="submit"],
        button[type="submit"] {
            width: 100%;
            padding: 16px;
            background: linear-gradient(-225deg, #2CD8D5 0%, #C5C1FF 56%, #FFBAC3 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        input[type="submit"]:hover,
        button[type="submit"]:hover {
            background: linear-gradient(-225deg, #2CD8D5 0%, #C5C1FF 56%, #FFBAC3 100%);
            transform: translateY(-2px);
        }

        input[type="submit"]:active,
        button[type="submit"]:active {
            transform: translateY(0);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        ::placeholder {
            color: #9ca3af;
            opacity: 1;
        }

        html {
            scroll-behavior: smooth;
        }

        .result-container {
            margin-top: 24px;
            display: none;
        }

        .result-label {
            font-size: 15px;
            color: var(--text-color);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .result-box {
            background: #f5f5f5;
            border-radius: 12px;
            padding: 16px;
            word-break: break-all;
            font-size: 14px;
            margin-bottom: 12px;
            border: 1px solid var(--border-color);
        }

        .copy-btn {
            background: #f0f0f0;
            color: var(--text-color);
            border: none;
            padding: 10px 16px;
            border-radius: 12px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
        }

        .copy-btn:hover {
            background: #e0e0e0;
        }

        .copy-btn i {
            font-size: 14px;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }

            .form-header i {
                font-size: 48px;
            }

            .form-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="container glass-effect">
        <div class="form-header">
            <i class="fab fa-alipay"></i>
            <h1>支付宝防红</h1>
            <p>输入链接</p>
        </div>

        <form id="linkForm">
            <div class="form-group">
                <div class="input-wrapper">
                    <input type="text" 
                           id="content" 
                           name="content" 
                           placeholder="请输入链接"
                           required>
                    <i class="fas fa-link"></i>
                </div>
            </div>

            <button type="submit" class="submit-btn">生成</button>
        </form>

        <div class="result-container" id="resultContainer">
            <div class="result-label">生成结果：</div>
            <div class="result-box" id="resultBox"></div>
            <button class="copy-btn" id="copyBtn">
                <i class="fas fa-copy"></i>
                <span>复制结果</span>
            </button>
        </div>
    </div>

    <script>
        document.getElementById('linkForm').addEventListener('submit', async function (event) {
            event.preventDefault();

            const content = document.getElementById('content').value.trim();
            if (!content) {
                alert('请输入链接');
                return;
            }

            try {
                // 获取 fh.txt 文件内容
                const response = await fetch('fh.txt');
                if (!response.ok) {
                    throw new Error('无法加载 fh.txt 文件');
                }
                const fhContent = await response.text();

                // Base64编码用户输入的内容（不进行URI编码）
                const encodedContent = btoa(content);
                
                // 拼接结果：fh.txt 内容 + 编码后的内容
                const finalResult = fhContent + encodedContent;

                // 显示结果
                const resultBox = document.getElementById('resultBox');
                resultBox.textContent = finalResult;
                
                // 显示结果容器
                const resultContainer = document.getElementById('resultContainer');
                resultContainer.style.display = 'block';

                // 滚动到结果区域
                resultContainer.scrollIntoView({ behavior: 'smooth' });
            } catch (error) {
                alert('处理出错: ' + error.message);
                console.error(error);
            }
        });

        // 复制功能
        document.getElementById('copyBtn').addEventListener('click', function() {
            const resultText = document.getElementById('resultBox').textContent;
            
            if (navigator.clipboard) {
                navigator.clipboard.writeText(resultText).then(function() {
                    const copyBtn = document.getElementById('copyBtn');
                    copyBtn.innerHTML = '<i class="fas fa-check"></i><span>复制成功</span>';
                    setTimeout(() => {
                        copyBtn.innerHTML = '<i class="fas fa-copy"></i><span>复制结果</span>';
                    }, 2000);
                }).catch(function(error) {
                    alert('复制失败，请手动复制');
                });
            } else {
                const tempInput = document.createElement('input');
                tempInput.value = resultText;
                document.body.appendChild(tempInput);
                tempInput.select();
                try {
                    document.execCommand('copy');
                    const copyBtn = document.getElementById('copyBtn');
                    copyBtn.innerHTML = '<i class="fas fa-check"></i><span>复制成功</span>';
                    setTimeout(() => {
                        copyBtn.innerHTML = '<i class="fas fa-copy"></i><span>复制结果</span>';
                    }, 2000);
                } catch (error) {
                    alert('复制失败，请手动复制');
                } finally {
                    document.body.removeChild(tempInput);
                }
            }
        });
    </script>
</body>

</html>
